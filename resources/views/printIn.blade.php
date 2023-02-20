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
        <a id="print" href="{{ route('invoce.viewInvoice' , ['id' => 22]) }}" class="btnprn btn">Print Preview</a>
</center>
<script type="text/javascript">
        $(document).ready(function(){
        $('.btnprn').printPage();
        });
</script>




@endsection