<?php 
use Alkoumi\LaravelHijriDate\Hijri;
use GeniusTS\HijriDate\Date;

// Carbon::setlocale("ar");
setLocale(LC_TIME, 'ar_AE');
?>
@extends('layouts.my')
@section('content')
<!-- <link rel="stylesheet" href="/css/paper.css"> -->

<center>
        <br><br>
        <a id="prinst" href="{{ route('invoce.viewInvoice' , ['id' => 21]) }}" class="btnprn btn">Print Preview</a>
</center>
<script type="text/javascript">
        $(document).ready(function(){
        $('.btnprn').printPage();
        });
</script>

<style>@page { size: A5 }</style> 

<a id="print" class="btn btn-soft-success btn-icon btn-circle btn-sm btnprn"  href="{{ route('invoce.viewInvoice' , ['id'=>21]) }}"  title="{{ translate('View') }}">
                                <i class="las la-eye"></i>ss
                            </a>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                $('.btnprn').printPage();
                                });
                            </script>

@endsection