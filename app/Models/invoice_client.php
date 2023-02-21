<?php

namespace App\Models;
use App\Models\discreption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'warranty',
        'printed',
    ];

    public function discreption()
    {
        return $this->hasMany(discreption::class , 'invoice_id' , 'id');
    }

}
