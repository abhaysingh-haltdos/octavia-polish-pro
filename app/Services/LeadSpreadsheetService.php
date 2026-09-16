<?php

namespace App\Services;

use App\Models\Lead;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use ZipArchive;

class LeadSpreadsheetService
{
    public const HEADERS = [
        'Submission ID',
        'Full Name',
        'Email',
        'Phone',
        'Company',
        'Service Category',
        'Status',
        'Message',
        'Source Form',
        'Source URL',
        'IP Address',
        'Admin Notes',
        'Date Submitted',
    ];

    /**
     * Get the directory where lead spreadsheets are stored.
     */
    public function getStorageDir(): string
    {
        return storage_path('app/leads');
    }

    /**
     * Get path to the CSV master spreadsheet.
     */
    public function getCsvPath(): string
    {
        return $this->getStorageDir() . DIRECTORY_SEPARATOR . 'leads.csv';
    }

    /**
     * Get path to the XLSX master spreadsheet.
     */
    public function getXlsxPath(): string
    {
        return $this->getStorageDir() . DIRECTORY_SEPARATOR . 'leads.xlsx';
    }

    /**
     * Append a newly created lead to both Excel (.xlsx) and CSV files.
     */
    public function appendLead(Lead $lead): void
    {
        try {
            $dir = $this->getStorageDir();
            if (!File::isDirectory($dir)) {
                File::makeDirectory($dir, 0755, true);
            }

            $csvPath = $this->getCsvPath();
            $xlsxPath = $this->getXlsxPath();

            // If spreadsheet does not exist yet, sync all database leads into it
            if (!File::exists($csvPath) || !File::exists($xlsxPath)) {
                $this->syncAllLeads();
                return;
            }

            // Append row to CSV
            $row = $this->formatLeadRow($lead);
            $fp = fopen($csvPath, 'a');
            if ($fp) {
                fputcsv($fp, $row, ',', '"', '\\');
                fclose($fp);
            }

            // Regenerate XLSX to ensure workbook is 100% in sync
            $this->generateXlsx(Lead::orderBy('id', 'asc')->get(), $xlsxPath);

        } catch (\Throwable $e) {
            Log::error('LeadSpreadsheetService error appending lead: ' . $e->getMessage(), [
                'lead_id' => $lead->id,
                'submission_id' => $lead->submission_id,
            ]);
        }
    }

    /**
     * Re-sync all database leads into both CSV and XLSX files.
     */
    public function syncAllLeads(): void
    {
        $dir = $this->getStorageDir();
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        $leads = Lead::orderBy('id', 'asc')->get();

        // 1. Generate CSV with UTF-8 BOM
        $csvPath = $this->getCsvPath();
        $fp = fopen($csvPath, 'w');
        if ($fp) {
            // Write UTF-8 BOM so Microsoft Excel correctly renders all unicode characters
            fwrite($fp, "\xEF\xBB\xBF");
            fputcsv($fp, self::HEADERS, ',', '"', '\\');
            foreach ($leads as $lead) {
                fputcsv($fp, $this->formatLeadRow($lead), ',', '"', '\\');
            }
            fclose($fp);
        }

        // 2. Generate native XLSX
        $xlsxPath = $this->getXlsxPath();
        $this->generateXlsx($leads, $xlsxPath);
    }

    /**
     * Format a Lead model into an array matching HEADERS.
     */
    public function formatLeadRow(Lead $lead): array
    {
        return [
            $lead->submission_id ?? '',
            $lead->full_name ?? '',
            $lead->email ?? '',
            $lead->phone ?? '',
            $lead->company ?? '',
            $lead->service_category ?? '',
            $lead->status ?? 'new',
            $lead->message ?? '',
            $lead->source_form ?? '',
            $lead->source_url ?? '',
            $lead->ip_address ?? '',
            $lead->admin_notes ?? '',
            $lead->created_at?->toDateTimeString() ?? date('Y-m-d H:i:s'),
        ];
    }

    /**
     * Generate a valid Microsoft Excel OpenXML (.xlsx) file.
     *
     * @param iterable<Lead> $leads
     */
    public function generateXlsx(iterable $leads, string $filePath): void
    {
        $zip = new ZipArchive();
        if ($zip->open($filePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException("Unable to create XLSX zip package at: {$filePath}");
        }

        // [Content_Types].xml
        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n"
            . '<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">' . "\n"
            . '    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>' . "\n"
            . '    <Default Extension="xml" ContentType="application/xml"/>' . "\n"
            . '    <Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>' . "\n"
            . '    <Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>' . "\n"
            . '    <Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/>' . "\n"
            . '</Types>';
        $zip->addFromString('[Content_Types].xml', $contentTypes);

        // _rels/.rels
        $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n"
            . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">' . "\n"
            . '    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>' . "\n"
            . '</Relationships>';
        $zip->addFromString('_rels/.rels', $rels);

        // xl/_rels/workbook.xml.rels
        $wbRels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n"
            . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">' . "\n"
            . '    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>' . "\n"
            . '    <Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/>' . "\n"
            . '</Relationships>';
        $zip->addFromString('xl/_rels/workbook.xml.rels', $wbRels);

        // xl/styles.xml (with Octavia Navy branded header fill #153758 and bold white text)
        $styles = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n"
            . '<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">' . "\n"
            . '    <fonts count="2">' . "\n"
            . '        <font><name val="Calibri"/><sz val="11"/></font>' . "\n"
            . '        <font><b/><name val="Calibri"/><sz val="11"/><color rgb="FFFFFFFF"/></font>' . "\n"
            . '    </fonts>' . "\n"
            . '    <fills count="3">' . "\n"
            . '        <fill><patternFill patternType="none"/></fill>' . "\n"
            . '        <fill><patternFill patternType="gray125"/></fill>' . "\n"
            . '        <fill><patternFill patternType="solid"><fgColor rgb="FF153758"/></patternFill></fill>' . "\n"
            . '    </fills>' . "\n"
            . '    <borders count="1">' . "\n"
            . '        <border><left/><right/><top/><bottom/></border>' . "\n"
            . '    </borders>' . "\n"
            . '    <cellStyleXfs count="1">' . "\n"
            . '        <xf numFmtId="0" fontId="0" fillId="0" borderId="0"/>' . "\n"
            . '    </cellStyleXfs>' . "\n"
            . '    <cellXfs count="2">' . "\n"
            . '        <xf numFmtId="0" fontId="0" fillId="0" borderId="0" xfId="0"/>' . "\n"
            . '        <xf numFmtId="0" fontId="1" fillId="2" borderId="0" xfId="0" applyFont="1" applyFill="1"/>' . "\n"
            . '    </cellXfs>' . "\n"
            . '</styleSheet>';
        $zip->addFromString('xl/styles.xml', $styles);

        // xl/workbook.xml
        $wb = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n"
            . '<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">' . "\n"
            . '    <sheets>' . "\n"
            . '        <sheet name="Inbound Leads" sheetId="1" r:id="rId1"/>' . "\n"
            . '    </sheets>' . "\n"
            . '</workbook>';
        $zip->addFromString('xl/workbook.xml', $wb);

        // xl/worksheets/sheet1.xml
        $sheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
        $sheet .= '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">' . "\n";
        $sheet .= '    <sheetData>' . "\n";

        // Header row (s="1" for brand header style)
        $sheet .= '        <row r="1">' . "\n";
        foreach (self::HEADERS as $colIdx => $h) {
            $colLetter = $this->getColumnLetter($colIdx);
            $escaped = htmlspecialchars($h, ENT_XML1, 'UTF-8');
            $sheet .= '            <c r="' . $colLetter . '1" t="inlineStr" s="1"><is><t>' . $escaped . '</t></is></c>' . "\n";
        }
        $sheet .= '        </row>' . "\n";

        // Lead rows
        $rowIdx = 2;
        foreach ($leads as $lead) {
            $vals = $this->formatLeadRow($lead);
            $sheet .= '        <row r="' . $rowIdx . '">' . "\n";
            foreach ($vals as $colIdx => $v) {
                $colLetter = $this->getColumnLetter($colIdx);
                $escaped = htmlspecialchars((string)$v, ENT_XML1, 'UTF-8');
                $sheet .= '            <c r="' . $colLetter . $rowIdx . '" t="inlineStr"><is><t>' . $escaped . '</t></is></c>' . "\n";
            }
            $sheet .= '        </row>' . "\n";
            $rowIdx++;
        }

        $sheet .= '    </sheetData>' . "\n";
        $sheet .= '</worksheet>';
        $zip->addFromString('xl/worksheets/sheet1.xml', $sheet);

        $zip->close();
    }

    /**
     * Convert zero-based column index to spreadsheet column letter (A, B, C... Z, AA, AB...).
     */
    protected function getColumnLetter(int $colIndex): string
    {
        $letter = '';
        $colIndex += 1;
        while ($colIndex > 0) {
            $mod = ($colIndex - 1) % 26;
            $letter = chr(65 + $mod) . $letter;
            $colIndex = (int)(($colIndex - $mod) / 26);
        }
        return $letter;
    }
}
