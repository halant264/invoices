@extends('admin.layouts.app')

<?php 
use App\Models\invoice_client;
use App\Models\certificate;
use Carbon\Carbon;

?>

@section('content')
@if(Session('status'))
<div class="alert alert-success" role="alert">
       {{ session('status') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-6">
            <div class="card">
                <div class="card-header">عدد الفتواتير والشهادات</div>
                <div class="card-body d-flex justify-content-between">
                    <div>
                        عدد الشهادات
                    </div>
                    <div>
                       {{invoice_client::where('created_at', '>=', 1)->count()}}
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <div>
                        عدد الفواتير
                    </div>
                    <div>
                    {{certificate::whereDate('created_at', Carbon::today())->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">الضريبة</div>

                <div class="card-body text-right">
                    {{get_setting('tax')}}
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
