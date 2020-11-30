<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'from',
        'to',
        'sent_date',
        'subject',
        'uid',
        'msgno',
        'seen',
        'mbox',
    ];

}
