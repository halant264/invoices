<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\total_price;
use App\Models\sub_total;
use App\Models\invoice_client;
use App\Models\discreption;

class InvoiceController extends Controller
{
    public function show(){
        return view('admin.invoices.invoicesCreate');
    }

    public function store(Request $req){
        $invoice_client = new invoice_client(); 
        $invoice_client->name = $req->name ;
        $invoice_client->warranty = $req->warranty ;
        $invoice_client->save() ;

        for($i = 1 ; $i<=$req->j ; $i++){

            $total = new total_price(); 
            $total->h = $req->priceI+$i;
            $total->sr = $req->priceJ+$i;
            $total->save() ;

            $sub_total = new sub_total(); 
            $sub_total->h = $req->unitI+$i;
            $sub_total->sr = $req->unitJ+$i;
            $sub_total->save() ;

            $discreption = new discreption(); 
            $discreption->total_price_id = $total->id;
            $discreption->sub_price_id = $sub_total->id;
            $discreption->amount = $req->amountI+$i;
            $discreption->dis = $req->dis+$i;
            $discreption->invoice_id = $invoice_client->id;
            $discreption->save() ;

        }

        return("Done");


    }

    public function index(){

        $invoicess= invoice_client::with(['discreption' => function($q){
                $q->with('sub_total' , 'total_price');
        }])->get();

        $invoicess2= invoice_client::with(['discreption' => function($q){
                $q
                ->with('sub_total' , 'total_price');
                // ->select('*');
    
        }])->where('id' , 4)->get();

        // $products = $invoicess->paginate(15);
        $type = 'All';

        return view('admin.invoices.invoices' , compact(['invoicess' , /*'invoicess' => $products  , */ 'type'  ]));
 
    }
    public function viewInvoice($id){

        $invoicess= invoice_client::with(['discreption' => function($q){
                $q
                ->with('sub_total' , 'total_price');
                // ->select('*');
    
        }])->where('id' , $id)->get();

        return view('invoiceClient' , compact(['invoicess' ]));
 
    }
}
