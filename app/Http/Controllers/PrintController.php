<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\invoice_client;


class PrintController extends Controller
{
    public function index()
      {
            return view('invoice');
      }
      public function prnpriview($id)
      {

       
            $invoicess= invoice_client::with(['discreption' => function($q){
                  $q
                  ->with('sub_total' , 'total_price');
                  // ->select('*');
       
          }])->where('id' , $id)->first();
       // dd($invoicess->discreption);

          return view('invoiceClient' , compact('invoicess'));
      }
}
