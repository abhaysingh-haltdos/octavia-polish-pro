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
}
