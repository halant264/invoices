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
        <a id="print1" href="{{ route('invoce.viewInvoice' , ['id' => 21]) }}" class="btnprn btn">Print Preview</a>
</center>
<script type="text/javascript">
        $(document).ready(function(){
        $('.btnprn').printPage1();
        });
</script>




@endsection