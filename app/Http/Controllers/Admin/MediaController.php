<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Services\AuditLogger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MediaController extends Controller
{
    /**
     * Display the media library gallery.
     */
    public function index(Request $request): View|JsonResponse
    {
        $query = Media::with('uploader')->orderByDesc('id');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('original_name', 'like', "%{$search}%")
                  ->orWhere('alt_text', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%");
            });
        }

        $media = $query->paginate(24)->withQueryString();

        if ($request->wantsJson()) {
            return response()->json($media);
        }

        return view('admin.media.index', compact('media'));
    }

    /**
     * Store uploaded media files securely.
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'max:10240', // 10MB
                'mimes:jpeg,png,jpg,webp,svg,gif,avif',
            ],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
        ]);

        $uploadedFile = $request->file('file');

        // Security: Block any executable extension or double extension (e.g. file.php.jpg)
        $clientName = $uploadedFile->getClientOriginalName();
        $ext = strtolower($uploadedFile->getClientOriginalExtension());
        $forbiddenExtensions = ['php', 'phtml', 'phar', 'php3', 'php4', 'php5', 'php7', 'php8', 'exe', 'bat', 'sh', 'js', 'py', 'pl', 'cgi'];

        if (in_array($ext, $forbiddenExtensions) || preg_match('/\.(php[0-9]?|phtml|phar|exe|bat|sh|js)$/i', $clientName)) {
            abort(403, 'Dangerous file type detected.');
        }

        // Generate safe unique filename
        $safeName = Str::uuid() . '.' . $ext;
        $destinationDir = public_path('uploads');

        if (!File::isDirectory($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        // Move to uploads directory
        $uploadedFile->move($destinationDir, $safeName);
        $filePath = '/uploads/' . $safeName;

        // Image dimensions
        $dimensions = null;
        $fullPath = $destinationDir . DIRECTORY_SEPARATOR . $safeName;
        if (in_array($ext, ['jpeg', 'jpg', 'png', 'webp', 'gif']) && function_exists('getimagesize')) {
            $imgInfo = @getimagesize($fullPath);
            if ($imgInfo) {
                $dimensions = "{$imgInfo[0]}x{$imgInfo[1]}";
            }
        }

        $media = Media::create([
            'filename' => $safeName,
            'original_name' => pathinfo($clientName, PATHINFO_FILENAME),
            'file_path' => $filePath,
            'mime_type' => $uploadedFile->getClientMimeType() ?: 'image/' . $ext,
            'file_size' => File::size($fullPath),
            'dimensions' => $dimensions,
            'alt_text' => $request->input('alt_text') ?: pathinfo($clientName, PATHINFO_FILENAME),
            'title' => $request->input('title') ?: pathinfo($clientName, PATHINFO_FILENAME),
            'uploaded_by' => Auth::id(),
        ]);

        AuditLogger::log('MEDIA_UPLOADED', "File uploaded: [{$media->filename}] ({$media->original_name})");

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'media' => $media,
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', "File '{$media->original_name}' uploaded successfully.");
    }

    /**
     * Remove the specified media asset from storage and disk.
     */
    public function destroy(Media $media): RedirectResponse|JsonResponse
    {
        $filePath = public_path(ltrim($media->file_path, '/'));
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $filename = $media->filename;
        $media->delete();

        AuditLogger::log('MEDIA_DELETED', "File deleted: [{$filename}]");

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.media.index')->with('success', "Media asset deleted.");
    }
}
