<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\certificate;

class certificateontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $certificate= certificate::paginate(10);

        $type = 'All';

        return view('admin.invoices.certificate' , compact('certificate'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invoices.certificateCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_certificate = new certificate() ;
        $new_certificate->name_client = $request->name;
        $new_certificate->mobile	 = $request->mobile	;
        $new_certificate->no_car = $request->no_car;
        $new_certificate->model_car = $request->model_car;
        $new_certificate->warranty = $request->warranty;
        $new_certificate->warranty_date = $request->warranty_date;
        $new_certificate->dis	 = $request->dis	;
        $new_certificate->entry_date = $request->entry_date;
        $new_certificate->exit_date = $request->exit_date;


        $new_certificate->save() ;


        return redirect()->route('certificate.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate= certificate::find($id);

        return view('admin.invoices.certificateEdit' , compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request , certificate  $certificate)
    {
   
       
        $certificate->update($request->except(['_token' , '_method' , 'button']));
        return redirect()->route('certificate.index')->with('success','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('certificate.index');
    }

    public function certificateView($id)
    {
        $certificate= certificate::find($id);
        return view('certifecateView' , compact('certificate'));
    }

    public function certificatePrint( certificate $id)
    {
        $certificate = $id;
        return view('certifecatePrint' , compact('certificate'));
    }

}
