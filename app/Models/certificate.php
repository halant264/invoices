<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_client',
        'mobile',
        'no_car',
        'model_car',
        'entry_date',
        'exit_date',
        'warranty',
        'warranty_date',
        'dis',
    ];
 

}
