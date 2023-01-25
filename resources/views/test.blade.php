<?php 
use Alkoumi\LaravelHijriDate\Hijri;
use GeniusTS\HijriDate\Date;
?>
@extends('layouts.my')
@section('content')

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style2.css">

<body>

<section class="section-invoices">
        <h1 class="header-title text-center">مركز هويدي النسيم</h1>
        <div class="title-phone px-2">
            <div class="d-flex justify-content-between my-1 px-3">
                <div class="px-4">
                        مدالله هويدي
                </div>
                <div>
                   <span >جوال :</span> 505444 
                </div>
            </div>
            <div class="d-flex justify-content-between my-1 px-3">
                <div>
                       ميكانيك - كهرباء سيارات
                </div>
                <div>
                <span >جوال :</span> 505444
                </div>
            </div>
            <div>

            </div>
        </div>
        <div class="date-accept px-2 d-flex justify-content-between my-1">
 
                <div class="fs-12 m-auto">
                       التاريخ :   {{ Hijri::DateIndicDigits('j/F/Y')}}ه
                </div>
                <div class="cash-invoice-title m-auto">
                    فاتورة نقداَ <br>
                    Cash Invoice
                </div>
                <div class="fs-12 m-auto">
                       الموافق :   {{Date::today()->format('d/F/o')}}ه
                </div>
   
        </div> 
        <div class="title-phone px-2">
            <div class="d-flex w-100"> 
                <div class="name-invoices-title">
                    المطلوب من المكرم /
                </div>
                <div class="name-invoices text-center"> جميل طربوش
               
                </div>
                .Mr
            </div>
        </div> 
        <div class="container my-2 s-content ">
          <div class="row">
              <div class="col-12 p-0 header-invoice ">
                  <div class="row m-1">
                      <div class="col-3 h-col">
                          <div class="h-i-sec">
                          s
                          </div>
                      </div>
                      <div class="col-3 h-col">
                          <div class="h-i-sec">
                          s
                          </div>
                      </div>
                      <div class="col-1 h-col">
                        <div class="h-i-sec">
                          s
                          </div>
                      </div>
                      <div class="col-5 h-col">
                          <div class="h-i-sec">
                          s
                          </div>
                      </div>
                  </div>

                  
              </div>
              <div class="col-12 p-0 ">
                  <div class="row m-1">
                      <div class="col-3 h-col">
                          <div class=" h-i-sec">
                          @for($i=0 ; $i < 16  ; $i++)
                              <div class="d-flex border-row ">
                                  <div class="s-row" ></div>
                                  <div class="w-75 text-center h-cell">
                                        
                                  </div>
                              </div>
                              @endfor
                          </div>
                      </div>


                      <div class="col-3 h-col">
                            <div class=" h-i-sec">
                              @for($i=0 ; $i < 16  ; $i++)
                                  <div class="d-flex border-row">
                                      <div class="s-row" ></div>
                                      <div class="w-75 text-center h-cell">
                                            
                                      </div>
                                  </div>
                              @endfor
                            </div>
                      </div>
                      <div class="col-1 h-col">
                          <div class=" h-i-sec">
                              @for($i=0 ; $i < 16  ; $i++)
                                  <div class=" border-row">
                                      <div class="" ></div>
                                      <div class=" text-center h-cell">
                                            
                                      </div>
                                  </div>
                              @endfor
                          </div>
                      </div>
                      <div class="col-5 h-col">
                      <div class=" h-i-sec h-100">
                              @for($i=0 ; $i < 16  ; $i++)
                              @if($i == 11)
                              <div >
                                مركز هويدي النسيم 
                                <br>
                                  الضمان لا يشمل الكسر أو الاهمال
                                  <br>
                                ضمان لمدة: 
                                <br>
                                التاريخ :   {{ Hijri::DateIndicDigits('j/F/Y')}}ه
                                
                              </div>
                              @break
                              @else
                                  <div class=" border-row">
                                      <div class="" ></div>
                                      <div class=" text-center h-cell">
                                            
                                      </div>
                                  </div>
                                
                              @endif
                              
                              @endfor
                          </div>
                      </div>
                  </div>

                  
              </div>
              <div class="col-12 p-0  footer-invoice">
                  <div class="row m-1">
                      <div class="col-3 h-col">
                          <div class="h-i-sec">
                        
                          </div>
                      </div>
                      <div class="col-9 h-col">
                          <div class="h-i-sec d-flex " >
                              <div class="mx-1 my-auto " style=" width:15%">
                                  اللإجمالي: 
                              </div>
                              <div class="mx-1 my-auto " style="white-space: nowrap;overflow: hidden; width:70%;">
                              ...................................................................
                              </div>
                              <div class="mx-1 my-auto " style=" width:15%;">
                                :Total
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</section>

<style>
    .footer-invoice .h-i-sec{
      height :35px
    }
    .in-details{
        font-size: 12px;
        font-weight: bold;
    }
</style>
<section class="section-invoices">
   
</section>

<section class="section-invoices in-details">
        <div class=" d-flex justify-content-between" >
            <div class=" d-flex w-52">
                <div class="mx-1 my-auto " style=" width:15%">
                    اللإجمالي: 
                </div>
                <div class="mx-1 my-auto " style="white-space: nowrap;overflow: hidden; width:70%;">
                    ...................................................................
                </div>
                <div class="mx-1 my-auto " style=" width:15%;">
                    :Total
                </div>
            </div>
            <div class=" d-flex w-50">
                <div class="mx-1 my-auto " style=" width:15%">
                    اللإجمالي: 
                </div>
                <div class="mx-1 my-auto " style="white-space: nowrap;overflow: hidden; width:70%;">
                    ...................................................................
                </div>
                <div class="mx-1 my-auto " style=" width:15%;">
                    :Total
                </div>
            </div>
        </div>
   
</section>

</body> 
@endsection