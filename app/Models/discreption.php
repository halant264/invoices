<?php

namespace App\Models;
use App\Models\invoice_client;  
use App\Models\sub_total;  
use App\Models\total_price;  

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discreption extends Model
{
    use HasFactory;

    public function sub_total()
    {
        return $this->belongsTo(sub_total::class , 'sub_price_id' , 'id');
    }
    public function total_price()
    {
        return $this->belongsTo(total_price::class , 'total_price_id' , 'id');
    }

    public function invoice_client(){
        return $this->belongsTo(invoice_client::class );
    }
}
