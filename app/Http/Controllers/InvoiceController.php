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

            // $total = new total_price(); 
            // $total->h = $req->input('unitI'.$i);
            // $total->sr = $req->input('unitI'.$i);
            // $total->save() ;

            $sub_total = new sub_total(); 
            $sub_total->h = $req->input('unitI'.$i);
            $sub_total->sr = $req->input('unitJ'.$i);
            $sub_total->save() ;

            $discreption = new discreption(); 
            // $discreption->total_price_id = $total->id;
            $discreption->sub_price_id = $sub_total->id;
            $discreption->amount = $req->input('amountI'.$i);
            $discreption->dis = $req->input('dis'.$i);
            $discreption->invoice_id = $invoice_client->id;
            $discreption->save() ;

        }
        if( $req->button == 'print'){
            return redirect()->route('invoice.invoiceView' , ['id' => $invoice_client->id]);
        }
        else{
            return redirect()->route('invoice.index')->with('success','تم اضافة فاتورة جديدة');
        }

    }

    public function index(Request $request){

        $sort_search = null;

        $invoicess= invoice_client::with(['discreption' => function($q){
            $q->with('sub_total' , 'total_price');
         }])->paginate(10);

        if ($request->search != null) {
            $sort_search = $request->search;
            $invoicess= invoice_client::where('name', 'like', '%' . $sort_search . '%')
            ->with(['discreption' => function($q){
                $q->with('sub_total' , 'total_price');
             }])->paginate(10);
        }
        else{
            $invoicess= invoice_client::with(['discreption' => function($q){
                $q->with('sub_total' , 'total_price');
             }])->paginate(10);
        }
        // $invoicess2= invoice_client::with(['discreption' => function($q){
        //         $q
        //         ->with('sub_total' , 'total_price');
        //         // ->select('*');
        // }])->where('id' , 4)->get();

        // $products = $invoicess->paginate(10);
        $type = 'All';

        return view('admin.invoices.invoices' , compact(['invoicess' , 'sort_search'  ,  'type'  ]));
 
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
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoicess= invoice_client::with(['discreption' => function($q){
            $q
            ->with('sub_total' , 'total_price');
            // ->select('*');

        }])->where('id' , $id)->first();
        return view('admin.invoices.invoicesEdit' , compact('invoicess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\invoice_client  $invoice_client
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request , invoice_client  $invoice_client)
    {

        $invoice_client->update($request->only(['name' , 'warranty' ]));

        for($i = 1 ; $i<=$request->j ; $i++){
            discreption::where('id',$request->input('id_dis'.$i))->update(['amount'=>$request->input('amountI'.$i) ,'dis'=>$request->input('dis'.$i) ]);
            sub_total::where('id',$request->input('id_sub_total_dis'.$i))->update(['h'=>$request->input('unitI'.$i) ,'sr'=>$request->input('unitJ'.$i) ]);

        }

        return redirect()->route('invoice.index')->with('success','تم التعديل');
    }


    public function printIn(){
        return view('printIn' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function delete( invoice_client $invoice_client){
    
        $invoicess = invoice_client::find($invoice_client->id);
        $invoicess->delete();
        
        return redirect()->route('certificate.index');
 
    }

    public function invoiceView($id)
    {
        $invoicess= invoice_client::find($id);
        return view('invoiceView' , compact('invoicess'));
    }

    public function invoicePrint( invoice_client $id)
    {
        $invoicess = $id;
        return view('invoicePrint' , compact('invoicess'));
    }
}
