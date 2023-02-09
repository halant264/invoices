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

        if($req->button == 'print'){
            $invoice_client->printed = 'yes'; 
        }
        $invoice_client->save() ;

        for($i = 1 ; $i<=$req->j ; $i++){

            $total = new total_price(); 
            $total->h = $req->input('unitI'.$i);
            $total->sr = $req->input('unitI'.$i);
            $total->save() ;



            $sub_total = new sub_total(); 
            $sub_total->h = $req->input('unitI'.$i);
            $sub_total->sr = $req->input('unitJ'.$i);
            $sub_total->save() ;

            $discreption = new discreption(); 
            $discreption->total_price_id = $total->id;
            $discreption->sub_price_id = $sub_total->id;
            $discreption->amount = $req->input('amountI'.$i);
            $discreption->dis = $req->input('dis'.$i);
            $discreption->invoice_id = $invoice_client->id;
            $discreption->save() ;

        }

       

        if( $req->button == 'print'){
            return redirect()->route('invoce.viewInvoice' , ['id' => $invoice_client->id]);

        }
        else{
            return("Done");
        }
       


    }

    public function index(){

        $invoicess= invoice_client::with(['discreption' => function($q){
                $q->with('sub_total' , 'total_price');
        }])->paginate(10);

        $invoicess2= invoice_client::with(['discreption' => function($q){
                $q
                ->with('sub_total' , 'total_price');
                // ->select('*');
    
        }])->where('id' , 4)->get();

        // $products = $invoicess->paginate(10);
        $type = 'All';

        return view('admin.invoices.invoices' , compact(['invoicess' , /*'invoicess' => $products  , */ 'type'  ]));
 
    }
    public function viewInvoice($id){

      
        $invoicess= invoice_client::with(['discreption' => function($q){
                $q
                ->with('sub_total' , 'total_price');
                // ->select('*');
    
        }])->where('id' , $id)->first();
     // dd($invoicess->discreption);
        return view('invoiceClient' , compact('invoicess'));
 
    }

    public function printIn(){

    
        return view('printIn' );
 
    }

    public function delete( Request $req ){

        // dd($req->all());
        $invoicess = invoice_client::find($req->id_d);
        $invoicess->delete();
     // dd($invoicess->discreption);
        return Back();
 
    }
}
