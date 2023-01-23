<?php 
use Alkoumi\LaravelHijriDate\Hijri;
use GeniusTS\HijriDate\Date;
?>
@extends('layouts.my')
@section('content')


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
        <div class="date-accept px-2">
            <div class="d-flex justify-content-between my-1 ">
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
            <div>
            </div>
        </div>  
</section>

<section class="section-invoices">
        <div class="title-phone px-2">
            <div class="d-flex w-100"> 
                <div class="name-invoices-title">
                    المطلوب من المكرم /
                </div>
                <div class="name-invoices text-center"> جميل طربوش
                  <!-- <div>
                      igh
                  </div>
                  <div>
                      _________________________________________________
                  </div> -->
                </div>
                .Mr
            </div>
        </div>

        <div class="my-2 table-content p-2">

  
            <table class="table border-t m-0 " >
                <tr class=" m-1">
                    <th class="border-t">
                        Id
                    </th>
                    
                    <th class="border-t">
                        Name
                    </th>
                    <th class="border-t">
                        Email
                    </th>
                    <th class="border-t">
                        Course
                    </th>
                </tr>
                @for ($i = 10; $i >= 0; $i--)
                <tr class=" m-1">
                    <td class="border-t">
                        <div>
                           $i
                        </div>
                        <div>
                           $i
                        </div>
                    </td>
                    <td class="border-t">
                        <div>
                        $i
                        </div>
                        <div>
                        $i
                        </div>
                    </td>
                    <td class="border-t">
                        <div>
                        $i
                        </div>
                        <div>
                        $i
                        </div>
                    </td>
                    <td class="border-t">
                        <div>
                        $i
                        </div>
                        <div>
                        $i
                        </div>
                    </td>
                </tr>
    @endfor
               
             
           
             
             
        </div>
</section>

@endsection

@foreach($i as $j =>$value)
                    <td class="border-t ">
                        <div class="">
                            gy
                        </div>
                    @foreach ($value as $num)
                        <div class=" border-tb">
                
                          {{$j}}  {{ $num}}
                        </div>
                        
                    @endforeach
                    </td>
                    
                @endforeach