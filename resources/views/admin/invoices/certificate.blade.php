<?php
use Carbon\Carbon;
?>
@extends('admin.layouts.app')
@section('content')



<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">جميع الشهادات</h1>
        </div>
            <div class="col text-left">
                <a href="{{ route('certificate.create') }}" class="btn btn-circle btn-info">
                    <span>انشاء شهادة</span>
                </a>
            </div>
    </div>
</div>
<br>

@if ($message = Session::get('success'))
<div class="alert alert-success text-center" role="alert">
       {{ session('success') }}
</div>
@endif

<div class="card">
    <form class="" id="sort_products" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6 text-right">جميع الشهادات</h5>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="بحث">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr class="text-right">

                        <th>اسم المكرم</th>
                        <th data-breakpoints="md">رقم السيارة</th>
                        <th data-breakpoints="sm">موديل السيارة</th>
                        <th data-breakpoints="sm">مدة الضمان</th>
                        <th data-breakpoints="lg">تاريخ الخروج	</th>
                        <th data-breakpoints="sm" class="text-right">الخيارات</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($certificate as $value)
                    <tr class="text-right">
                        <td>
                            {{$value->name_client}}
                        </td>
                        <td>
                             {{$value->no_car}}
                        </td>
                        <td>
                           {{$value->model_car}}
                        </td>
                        <td>
                             {{$value->warranty}}
                        </td>

                        <td>
                            {{Carbon::createFromFormat('Y-m-d H:i:s', $value->exit_date)->format('m/d/Y')}} 
                        </td>

                        <td class="text-right">
                        <a id="print" class="btn btn-soft-success btn-icon btn-circle btn-sm" target="_blank"  href="{{ route('certificate.certificateView' , ['id'=>$value->id]) }}"  title="اظهار">
                                <i class="las la-eye"></i>
                            </a>
                         
                            <a class="btn btn-soft-warning btn-icon btn-circle btn-sm" href="{{route('certificate.edit', $value->id  )}}" title="تعديل">
                                <i class="las la-edit"></i>
                            </a>
                            <a class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete c-d" data-crf="certificate.destroy" data-href="{{route('certificate.destroy' , $value->id)}}" title="حذف">
                              <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
            {{ $certificate->appends(request()->input())->links() }}
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
        $(document).ready(function(){
        $('.btnprn').printPage();
        });
</script>



@endsection




@section('modal' )
    @include('admin.modals.delete_modal' , ['routeName' => 'certificate.destroy']  )
@endsection



