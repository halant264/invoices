<?php 
use Alkoumi\LaravelHijriDate\Hijri;
use GeniusTS\HijriDate\Date;
?>
@extends('layouts.my')
@section('content')
<center>
<br><br>
<a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>

<style>
    
</style>


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

            <table class="table" >
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->user_id }}</td>
                        <td>{{ $student->country_id }}</td>
                    </tr>
                @endforeach
</section>
@endsection