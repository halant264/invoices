@extends('layouts.my')
@section('content')
<center>
<br><br>
<a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a>
</center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
<center>
<h1>Course List </h1>
<table class="table" >
<tr><th>Id</th><th>Name</th><th>Email</th><th>Course</th></tr>
 @foreach($students as $student)
<tr><td>{{ $student->id }}</td>
<td>{{ $student->address }}</td>
<td>{{ $student->user_id }}</td>
<td>{{ $student->country_id }}</td> </tr>
@endforeach
</center>
@endsection