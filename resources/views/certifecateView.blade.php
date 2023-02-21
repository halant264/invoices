<?php 
use Alkoumi\LaravelHijriDate\Hijri;
use GeniusTS\HijriDate\Date;
use Carbon\Carbon;

?>

@extends('layouts.my')
@section('content')

<link rel="stylesheet" href="/css/boot.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/paper.css">
<center>
        <br><br>
        <a id="print" href="{{ route('certificate.certificatePrint' , ['id' => $certificate->id ]) }}" class="btnprn btn">Print Preview</a>
</center>
<script type="text/javascript">
        $(document).ready(function(){
        $('.btnprn').printPage();
        });
</script>

<body class="A5">
    
<section class="sheet section-invoices ">
        <h1 class="header-title text-center ffa f-bold">مركز هويدي النسيم</h1>

        <div class="w-100 line-div f-bold">
           <div class="">
                   ميكانيك - كهرباء سيارات  
           </div>
        </div>
        <div class="title-phone-v2 d-flex justify-content-end f-bold">
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
                   اسم العميل : <span class="d-block  mx-1 text-right"> {{$certificate->name_client}} </span>
                   <!-- <span class="input-border d-block w-75 mx-1"></span> -->
                </div>
                <div class="d-flex " >
                  الجوال : <span class="d-block  mx-1 text-right"> {{$certificate->mobile}}</span>
                  <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
            </div>
            <div class="car-input d-flex justify-content-between">
                <div class="d-flex ">
                   رقم السيارة : <span class="d-block  mx-1 text-right"> {{$certificate->no_car}}</span>
                   <!-- <span class="input-border d-block w-75 mx-1 text-right">صصص</span> -->
                </div>
                <div class="d-flex " >
                  نوعها : <span class="d-block  mx-1 text-right"> {{$certificate->model_car}}</span>
                  <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
                <div class="d-flex " >
                  تاريخ الدخول : <span class="d-block  mx-1 text-right"> {{ Carbon::createFromFormat('Y-m-d H:i:s', $certificate->entry_date)->translatedFormat('j-F-Y')}}م</span>
                   <!-- <span class="input-border d-block w-100 mx-1"></span> -->
                </div>
            </div>

        </div>

        <div class="row my-4  mx-5">
          <div class="col-1 side-title1"> <span class="fs-18"> تعتبر هذه الشهادة لاغية بدون الختم </div>
           <div class="ce-car2 col-11  px-1 py-3">
           <div class="descreption "> <span class="fs-18"> البيان</div>
                    <div class="border-row text-center h-cell">
                      {{$certificate->dis}}
                    </div>
                @for($i=0 ; $i < 10  ; $i++)
                    <div class="border-row text-center h-cell">
                    </div>
                @endfor
            </div>
            
            

        </div>

        <div class="row mx-5">
            <div class="col-6 text-right">
                    <div class="f-bold fs-14">
                        تاريخ خروج السيارة: {{ Carbon::createFromFormat('Y-m-d H:i:s', $certificate->exit_date)->translatedFormat('j-F-Y')}}م
                    </div>
                    <div class="f-bold">
                        <h5 class="text-center mt-2 mb-1">المستلم</h5>
                        <div class="d-flex align-items-end my-1">
                            <div class="h-18  ml-2 ">
                              الاسم:
                            </div>
                            <div class="input-border w-75">
                            </div>
                        </div>
                        <div class="d-flex align-items-end my-3">
                            <div class="h-18 ml-1">
                              التوقيع:
                            </div>
                            <div class="input-border w-75">
                            </div>
                        </div>
                        <div  class="text-left my-2 ">
                           الختم
                        </div>
                    </div>
            </div>
            <div class="col-6 py-1 px-2 ce-car" >
                <!-- <div> -->
                    <div class="border-b text-center f-bold w-100">
                    <span class="ffa fs-35">مركز هويدي النسيم </span>   <br>  <span class="fs-19">  الضمان لا يشمل الكسر أو الإهمال </span>   
                    </div>
                    <div class="d-flex">
                        <div class="text-right f-bold my-2">
                        <div class="fs-16">
                            مدة الضمان : <span class="fs-14">{{$certificate->warranty}}  </span> 
                        </div>
                        <div class="fs-16">
                            بداية الضمان : <span class="fs-14"> {{Carbon::createFromFormat('Y-m-d H:i:s', $certificate->warranty_date)->format('m/d/Y')}}  </span>  
                        </div>
                        </div>
                    </div>
                    
                <!-- </div> -->
            </div>
        </div>
</section>

</body>


@endsection