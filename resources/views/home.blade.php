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
                       {{invoice_client::whereDate('created_at', Carbon::today())->count()}}
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
                    <div class="card-body text-right d-flex justify-content-between">
                        <div>
                            <div class="d-none input-tax ">
                                <div class="d-flex justify-content-between">
                                    <div>
                                      <input type="text" class="form-control" id="tax" name="tax" value=" {{get_setting('tax')}}" placeholder=" الضريبة"  >
                                    </div>
                                     <div class="spinner-border m-auto d-none" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <a id="update-tax" class="my-auto mx-1 " href="#"> تعديل</a>
                                </div>
                            </div>
                            <div class=" text-tax ">
                               {{get_setting('tax')}}
                            </div>
                        </div>
                        <div>
                            <a id="edit-tax" class="btn btn-soft-warning btn-icon btn-circle btn-sm" href="#" title="تعديل">
                                <i class="las la-edit"></i>
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
</div>
</div>

<script type="text/javascript">
        
        $(document).on("click", "#edit-tax", function() {
          $('.input-tax').removeClass('d-none');
          $('.text-tax').addClass('d-none');
        });
        $(document).on("click", "#update-tax", function() {
            $('#update-tax').addClass('d-none');
            $('.spinner-border').removeClass('d-none');
            
            var formData = new FormData();
            var tax = $('#tax').val();
            formData.append('tax', tax);

            $.ajax(base_url+'/updateTax', {
                type: 'POST',  // http method
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function (data, status, xhr) {
                    window.location.reload();
                },
                error: function (jqXhr, textStatus, errorMessage) {
                   
                }
            });

        });

</script>


<script type="text/javascript">
    var base_url = window.location.origin;
</script>


@endsection
