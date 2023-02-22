@extends('admin.layouts.app')

@section('content')



<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">جميع الفواتير</h1>
        </div>
            <div class="col text-left">
                <a href="{{ route('invoice.create') }}" class="btn btn-circle btn-info">
                    <span>انشاء فاتورة</span>
                </a>
            </div>
    </div>
</div>
<br>

@if(Session('success'))
<div class="alert alert-success text-center" role="alert">
       {{ session('success') }}
</div>
@endif

<div class="card">
    <form class="" id="sort_products" action="#" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6 text-right">جميع الفواتير</h5>
            </div>
            <!-- <div class="col-md-2 ml-auto">
                <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" name="type" id="type" onchange="sort_products()">
                    <option value="">فرز </option>
                </select>
            </div> -->
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="بحث">
                </div>
            </div>
        </div>
    
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>اسم المكرم</th>
                        <th >مدة الضمان</th>
                       
                        <th  class="text-center">خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoicess as $value)
                    <tr>
                        <td>
                            {{$value->name}}
                        </td>
                        <td>
                             {{$value->warranty}}
                        </td>
                    
                        <td class="text-center">
                            <a id="print" class="btn btn-soft-success btn-icon btn-circle btn-sm" target="_blank"  href="{{ route('invoice.invoiceView' , ['id'=>$value->id]) }}"  title="اظهار">
                                <i class="las la-eye"></i>
                            </a>
                         
                            <a class="btn btn-soft-warning btn-icon btn-circle btn-sm" href="{{route('invoice.edit', ['id'=>$value->id]  )}}" title="تعديل">
                                <i class="las la-edit"></i>
                            </a>
                            <a class="btn   btn-circle btn-sm px-0"> 
                            <!-- <form action="{{ route('invoice.delete' , $value->id ) }}" method="POST"> -->
                                <!-- <a class="btn btn-primary" href="#">Edit</a> -->
                                <!-- @csrf
                                @method('DELETE') -->
                                  <!-- <input type="hidden" value="{{$value->id}}" name="id_d"> -->
                                  <button type="submit" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('invoice.delete' , $value->id)}}" title="حذف">
                                  <i class="las la-trash"></i>
                                  </button>
                                  <!-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{ route('invoice.delete' , $value->id )  }}" title="{{ translate('Delete')   }}">
                                    <i class="las la-trash"></i>
                                </a> -->
                            <!-- </form> -->
                            </a>
                            <!-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('invoice.delete' , $value->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
            {{ $invoicess->appends(request()->input())->links() }}
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

@section('modal')
    @include('admin.modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">
        
        
        
        function bulk_delete() {
            var data = new FormData($('#sort_products')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('home')}}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response == 1) {
                        location.reload();
                    }
                }
            });
        }

      
        


    </script>
@endsection
