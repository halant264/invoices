<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_total extends Model
{
    use HasFactory;

    protected $fillable = [
        'h',
        'sr',
    ];
}
