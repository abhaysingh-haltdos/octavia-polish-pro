<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'source_form',
        'source_url',
        'full_name',
        'email',
        'phone',
        'company',
        'service_category',
        'message',
        'admin_notes',
        'status',
        'ip_address',
        'user_agent',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function (Lead $lead) {
            try {
                app(\App\Services\LeadSpreadsheetService::class)->appendLead($lead);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('Failed to sync lead to spreadsheet: ' . $e->getMessage());
            }
        });
    }
}
