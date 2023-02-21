<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="fa" />

<title>هويدي النسيم</title>

<link href="https://www.dafontfree.net/embed/bW8tbmF3ZWwtcmVndWxhciZkYXRhLzQxL20vOTc5ODUvTU9fTmF3ZWwudHRm" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{{ asset('/js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jPrintPages.js') }}"></script>

<link rel="stylesheet" href="/css/boot.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">



</head>
<!-- <body> -->
<!-- <div class="container">
<div class="col-md-12"> -->

@yield('content')
<!-- </div>
</div> -->
<!-- </body> -->
</html>