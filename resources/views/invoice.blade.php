<?php 
use Alkoumi\LaravelHijriDate\Hijri;
use GeniusTS\HijriDate\Date;
?>
@extends('layouts.my')
@section('content')

<link rel="stylesheet" href="css/boot.css">
<link rel="stylesheet" href="css/style.css">

<style>
   .line-div {
        position: relative;
        height: 2px;
        background: black;
    }
    .line-div div {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: -10px;
        background: white;
        padding: 0 2px;
      
    }
    .title-phone-v2{
        margin: 10px;
    }
    .title-phone-v2 div{
        display: flex;
        justify-content: center;


        
    }
    .title-phone-v2 .title-v2{
        margin-left: -4rem;
    }
    .ce-car{
        border-radius:10px ;
        border : 1px solid black ;
        position: relative;
    }
    .ce-car .ce-car-title{
        line-height: 1;
        font-weight: bold;
        font-size: 11px;
        text-align: center;
        border-radius: 10px;
        border: 1px solid black;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: -23%;
        background: white;
        padding: 5px 10px;
        box-shadow: 0px 2px;
    }
    .ce-car .descreption{
        line-height: 1;
        font-weight: bold;
        font-size: 11px;
        text-align: center;
        border-radius: 10px;
        border: 1px solid black;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: -18%;
        background: white;
        padding: 5px 10px;
        
    }
    .car-input div{
        font-size: 15px;
        font-weight: bold;
        align-items: baseline;
    
    }
    .input-border{
        border-bottom: 1px dotted black ;
    }
</style>

<body class="A5">
    
<section class="sheet section-invoices ">
        <h1 class="header-title text-center">مركز هويدي النسيم</h1>

        <div class="w-100 line-div ">
           <div class="   ">
                   ميكانيك - كهرباء سيارات  
           </div>
        </div>
        <div class="title-phone-v2 d-flex justify-content-end">
            <div class="my-auto w-75 title-v2">
                مد الله هويدي
            </div>
            <div class=" w-25">
               <div class="my-auto ">
                  الجوال: 
               </div>
               <div>
                  0504448754 <br>
                  0596933015
               </div>
            </div>

        </div>

        <div class="ce-car my-4 p-3 mx-5">
            <div class="ce-car-title "> <span class="fs-18"> شهادة دخول السيارة </span> <br> Vehicle Entry Certificate</div>
            <div class="car-input d-flex justify-content-between mt-4">
                <div class="d-flex">
                   اسم العميل : <span class="d-block  mx-1 text-right"> جميل طربوش  </span>
                   <!-- <span class="input-border d-block w-75 mx-1"></span> -->
                </div>
                <div class="d-flex " >
                  الجوال : <span class="d-block  mx-1 text-right"> 0504448754</span>
                  <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
            </div>
            <div class="car-input d-flex justify-content-between">
                <div class="d-flex ">
                   رقم السيارة : <span class="d-block  mx-1 text-right"> 158479</span>
                   <!-- <span class="input-border d-block w-75 mx-1 text-right">صصص</span> -->
                </div>
                <div class="d-flex " >
                  نوعها : <span class="d-block  mx-1 text-right"> 158479</span>
                  <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
                <div class="d-flex " >
                  تاريخ الدخول : <span class="d-block  mx-1 text-right"> {{ Carbon\Carbon::now()->translatedFormat('j-F-Y')}}م</span>
                   <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
            </div>

        </div>
        <div class="ce-car my-4 p-3 mx-5">
            <div class="descreption "> <span class="fs-18"> البيان</div>
            <div class=" "> <span class="fs-18"> تعتبر هذه الشهادة لاغية بدون الختم </div>
            <div class="car-input d-flex justify-content-between mt-4">
                <div class="d-flex">
                   اسم العميل : <span class="d-block  mx-1 text-right"> جميل طربوش  </span>
                   <!-- <span class="input-border d-block w-75 mx-1"></span> -->
                </div>
                <div class="d-flex " >
                  الجوال : <span class="d-block  mx-1 text-right"> 0504448754</span>
                  <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
            </div>
            <div class="car-input d-flex justify-content-between">
                <div class="d-flex ">
                   رقم السيارة : <span class="d-block  mx-1 text-right"> 158479</span>
                   <!-- <span class="input-border d-block w-75 mx-1 text-right">صصص</span> -->
                </div>
                <div class="d-flex " >
                  نوعها : <span class="d-block  mx-1 text-right"> 158479</span>
                  <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
                <div class="d-flex " >
                  تاريخ الدخول : <span class="d-block  mx-1 text-right"> {{ Carbon\Carbon::now()->translatedFormat('j-F-Y')}}م</span>
                   <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
            </div>

        </div>
</section>

</body>


@endsection