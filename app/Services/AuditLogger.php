<?php

namespace App\Services;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditLogger
{
    /**
     * Log a security or administrative action to the audit_logs table.
     */
    public static function log(string $action, ?string $details = null, ?User $user = null): AuditLog
    {
        $currentUser = $user ?: Auth::user();

        return AuditLog::create([
            'user_id' => $currentUser?->id,
            'username' => $currentUser?->username ?: ($currentUser?->name ?: 'system'),
            'action' => strtoupper($action),
            'details' => $details,
            'ip_address' => Request::ip() ?: '127.0.0.1',
            'user_agent' => Request::userAgent(),
        ]);
    }
}
