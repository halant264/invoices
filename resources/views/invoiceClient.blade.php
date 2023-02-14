<?php

use Alkoumi\LaravelHijriDate\Hijri;
use GeniusTS\HijriDate\Date;

setLocale(LC_TIME, 'ar_AE');
?>
@extends('layouts.my')
@section('content')

<link rel="stylesheet" href="/css/paper.css">

<style>
    @page {
        size: A5
    }
</style>


<body class="A5">
        <section class="sheet section-invoices padding-10mm">
        <h1 class="header-title text-center">مـركـز هويــدي النسيـم</h1>
        <div class="title-phone px-2 f-bold">
            <div class="d-flex justify-content-between mt-1 px-3">
                <div class="px-4">
                    مدالله هويدي
                </div>
                <div>
                    <span>جوال: </span> 0504448754
                </div>
            </div>
            <div class="d-flex justify-content-between mb-1 px-3">
                <div>
                    ميكانيك - كهرباء سيارات
                </div>
                <div>
                    <span>جوال: </span> 0596933015
                </div>
            </div>
            <div>

            </div>
        </div>
        <div class="date-accept px-2 d-flex justify-content-between f-bold">

            <div class="fs-12 m-auto">
                التاريخ : {{ Hijri::DateIndicDigits('j/F/Y')}}ه
            </div>
            <div class="m-auto">
                <div class="cash-invoice-tax py-0 px-1 mx-auto">
                    رقم الضريبة
                    123456
                </div>
                <div class="cash-invoice-title  p-1">
                    فاتورة نقداَ <br>
                    Cash Invoice
                </div>


            </div>
            <div class="fs-12 m-auto">
                الموافق : {{ Carbon\Carbon::now()->translatedFormat('l/j/F/Y')}}م
            </div>

        </div>
        <div class="title-phone px-2 f-bold">
            <div class="d-flex w-100 align-items-end">
                <div class="name-invoices-title ">
                    <span class="h-18 ">المطلوب من المكرم /</span>
                </div>
                <div class="name-invoices justify-content-center"> {{$invoicess->name}} </div>
                <div class="name-invoices-title ">
                    <span class="h-18 align-items-end">.Mr</span>
                </div>

            </div>
        </div>
        <div class="container my-1 s-content ">
            <div class="row">
                <div class="col-12 p-0 header-invoice ">
                    <div class="row m-1">
                        <div class="col-3 h-col">
                            <div class="h-i-sec ">
                                <div class="h-75 fs-12 "> <span class="d-block f-bold">القيمة الاجمالية</span><span class="d-block">.Total Amount</span></div>
                                <div class="d-flex h-25 border-top">
                                    <div class="s-row fs-9 f-bold ">هـ.H</div>
                                    <div class="w-75 fs-9 f-bold "> ريال S.R</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 h-col">
                            <div class="h-i-sec ">
                                <div class="h-75 fs-12"> <span class="d-block f-bold">سعـر الوحـدة</span><span class="d-block">.Unit Price</span></div>
                                <div class="d-flex h-25 border-top">
                                    <div class="s-row fs-9 f-bold ">هـ.H</div>
                                    <div class="w-75 fs-9 f-bold "> ريال S.R</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 h-col">
                            <div class="h-i-sec d-flex ">
                                <div class=" fs-12 m-auto"> <span class="d-block f-bold">العدد</span><span class="d-block">.Qty</span></div>
                            </div>
                        </div>
                        <div class="col-5 h-col">
                            <div class="h-i-sec d-flex">
                                <div class=" fs-12 m-auto"> <span class="d-block f-bold">البيان</span><span class="d-block">.Description</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $countRow = 0 ;
                $total = 0 ;
                @endphp
                <div class="col-12 p-0 ">
                    <div class="row m-1">
                        <div class="col-3 h-col">
                            <div class=" h-i-sec">
                                @for($i=0 ; $i < 16 ; $i++) @if($countRow < count($invoicess->discreption))
                                    <div class="d-flex border-row ">
                                        <div class="s-row  fs-12"> {{($invoicess->discreption[$i]->amount)*$invoicess->discreption[$i]->sub_total->h}}</div>
                                        <div class="w-75 text-center h-cell">
                                        {{($invoicess->discreption[$i]->amount)*$invoicess->discreption[$i]->sub_total->sr}}
                                        </div>
                                        @php $countRow++; $total = $total+($invoicess->discreption[$i]->amount)*$invoicess->discreption[$i]->sub_total->sr @endphp
                                    </div>
                                    @else
                                    <div class="d-flex border-row ">
                                        <div class="s-row  fs-12"></div>
                                        <div class="w-75 text-center h-cell"></div>
                                    </div>
                                    @endif
                                    @endfor
                                    @php $countRow =0; @endphp
                            </div>
                        </div>
                        <div class="col-3 h-col">
                            <div class=" h-i-sec">
                                @for($i=0 ; $i < 16 ; $i++)
                                @if($countRow < count($invoicess->discreption))


                                    <div class="d-flex border-row ">
                                        <div class="s-row  fs-12"> {{$invoicess->discreption[$i]->sub_total->h}}</div>
                                        <div class="w-75 text-center h-cell">
                                            {{$invoicess->discreption[$i]->sub_total->sr}}
                                        </div>
                                        @php $countRow++;  @endphp
                                    </div>
                                    @else
                                    <div class="d-flex border-row ">
                                        <div class="s-row  fs-12"></div>
                                        <div class="w-75 text-center h-cell"></div>
                                    </div>
                                    @endif
                                    @endfor
                                    @php $countRow =0; @endphp
                            </div>
                        </div>
                        <div class="col-1 h-col">
                            <div class=" h-i-sec">
                                @for($i=0 ; $i < 16 ; $i++)
                                @if($countRow < count($invoicess->discreption))
                                 <div class=" border-row">
                                    <div class=" text-center h-cell">
                                    {{$invoicess->discreption[$i]->amount}}
                                    </div>
                                 </div>
                                 @php $countRow++;  @endphp
                                 @else
                                 <div class=" border-row">
                                    <div class=" text-center h-cell">
                                    
                                    </div>
                                 </div>
                                 @endif
                                
                            @endfor
                            @php $countRow =0; @endphp
                        </div>
                    </div>
                    <div class="col-5 h-col">
                        <div class=" h-i-sec h-100">
                            @for($i=0 ; $i < 16 ; $i++) 
                            @if($i==11) 
                            <div class="d-flex my-auto mx-1 text-center ">
                                <div class="d-block mt-1">
                                    <span class="f-bold fs-26">مركز هويدي النسيم </span>
                                    <span class="f-bold "> الضمان لا يشمل الكسر أو الاهمال </span>
                                    <span class="f-bold d-block mr-2 text-right"> ضمان لمدة: </span>
                                    <span class="f-bold "> من التاريخ : {{ Carbon\Carbon::now()->translatedFormat('j/F/Y')}}م </span>
                                </div>
                            </div>
                        @break
                        @else
                            @if($countRow < count($invoicess->discreption))
                                <div class=" border-row">
                                    <div class=" text-center h-cell">
                                    {{$invoicess->discreption[$i]->dis}}
                                    </div>
                                </div>
                            @php $countRow++;  @endphp
                            @else
                                <div class=" border-row">
                                    <div class=" text-center h-cell"></div>
                                </div>
                            @endif
                        @endif
                        @endfor
                        @php $countRow =0; @endphp
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
                    <div class="h-i-sec d-flex ">
                        <div class="mx-1 my-auto " style=" width:15%">
                            اللإجمالي:
                        </div>
                        <div class="mx-1 my-auto " style="white-space: nowrap;overflow: hidden; width:70%;">
                            ..................... {{$total}}  .......................................
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
        <div class=" d-flex justify-content-between w-100">
            <div class=" d-flex w-50 fs-12 justify-content-start f-bold">
                <div class="mx-1 my-auto ">
                    المستلم:
                </div>
                <div class="mx-1 my-auto " style="white-space: nowrap;overflow: hidden; ">
                    .........................
                </div>
                <div class="mx-1 my-auto ">
                    :Receiver
                </div>
            </div>
            <div class=" d-flex w-50 fs-12 justify-content-end f-bold">
                <div class="mx-1 my-auto ">
                    المدير:
                </div>
                <div class="mx-1 my-auto " style="white-space: nowrap;overflow: hidden; ">
                    .........................
                </div>
                <div class="mx-1 my-auto ">
                    :Manager
                </div>
            </div>
        </div>
        <div class="side-title">
            الفاتورة بدون ختم المركز تعتبر لاغية
        </div>
    </section>

</body>
<script type="text/javascript">
        $(document).ready(function(){
        printPage();
        });
</script>
@endsection