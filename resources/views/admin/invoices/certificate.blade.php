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
    <!-- <form class="" id="sort_products" action="" method="GET"> -->
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6 text-right">جميع الشهادات</h5>
            </div>
            <div class="col-md-2 ml-auto">
                <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" name="type" id="type" >
                    <option value="">فرز </option>
                </select>
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
                    <tr>
                        <th>اسم المكرم</th>
                        <th> رقم السيارة</th>
                        <th>موديل السيارة</th>
                        <th >مدة الضمان</th>
                        <th >تاريخ الخروج </th>
                        <th  class="text-center">خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificate as $value)
                    <tr>
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
                        <td class="text-center">
                            <a id="print" class="btn btn-soft-success btn-icon btn-circle btn-sm"  href="{{ route('certificate.certificateView' , ['id'=>$value->id]) }}"  title="اظهار">
                                <i class="las la-eye"></i>
                            </a>
                         
                            <a class="btn btn-soft-warning btn-icon btn-circle btn-sm" href="{{route('certificate.edit', $value->id  )}}" title="تعديل">
                                <i class="las la-edit"></i>
                            </a>
                            <a class="btn   btn-circle btn-sm px-0">
                                
                            <form action="{{ route('certificate.destroy' , $value->id ) }}" method="POST">
                                <!-- <a class="btn btn-primary" href="#">Edit</a> -->
                                @csrf
                                @method('DELETE')
                                  <input type="hidden" value="{{$value->id}}" name="id_d">
                                  <button type="submit" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delte" title="حذف">
                                  <i class="las la-trash"></i>
                                  </button>
                            </form>
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
    <!-- </form> -->
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
        
        $(document).on("change", ".check-all", function() {
            if(this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;                        
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;                       
                });
            }
          
        });

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post("{{ route('home') }}", {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', "{{ translate('Todays Deal updated successfully') }}");
                }
                else{
                    AIZ.plugins.notify('danger', "{{ translate('Something went wrong') }}");
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post("{{ route('home') }}", {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', "{{ translate('Published products updated successfully') }}");
                }
                else{
                    AIZ.plugins.notify('danger', "{{ translate('Something went wrong') }}");
                }
            });
        }
        
        function update_approved(el){
            if(el.checked){
                var approved = 1;
            }
            else{
                var approved = 0;
            }
            $.post("{{ route('home') }}", {
                _token      :   '{{ csrf_token() }}', 
                id          :   el.value, 
                approved    :   approved
            }, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', "{{ translate('Product approval update successfully') }}");
                }
                else{
                    AIZ.plugins.notify('danger', "{{ translate('Something went wrong') }}");
                }
            });
        }

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post("{{ route('home') }}", {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', "{{ translate('Featured products updated successfully') }}");
                }
                else{
                    AIZ.plugins.notify('danger', "{{ translate('Something went wrong') }}");
                }
            });
        }

        // function sort_products(el){
        //     $('#sort_products').submit();
        // }
        
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
