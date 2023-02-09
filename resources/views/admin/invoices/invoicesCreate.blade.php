@extends('admin.layouts.app')

@section('content')



<div class="aiz-titlebar text-right mt-2 mb-3">
    <h5 class="mb-0 h6">انشاء فاتورة جديدة</h5>
</div>
<div class="">
    <form class="form form-horizontal mar-top" action="{{route('invoce.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
        <div class="row gutters-5">
            <div class="col-lg-12">
                @csrf
                <input type="hidden" name="added_by" value="admin">
                <input type="hidden" name="j" value="1" id="addedJ">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">معلومات الفاتورة </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">اسم المكرم <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" placeholder="اسم المكرم" onchange="update_sku()" required>
                            </div>
                        </div>
                        <div class="form-group row" id="category">
                            <label class="col-md-3 col-from-label">مدة الضمان<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name="warranty" placeholder="مدة الضمان" onchange="update_sku()" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <input type="hidden" name="added_by" value="admin">
                <div class="card add-to">
                    <div class="card-header">
                        <h5 class="mb-0 h6">الوصف</h5>
                    </div>
                    <div class="card-body ">
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">سعر الوحدة</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="unitI1" placeholder="H" required>
                            </div>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="unitJ1" placeholder="SR" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">العدد <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="number" lang="en" class="form-control" name="amountI1" value="1" min="1" required>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-md-3 col-from-label">القيمة الاجمالية</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="priceI1" placeholder="H" required>
                            </div>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="priceJ1" placeholder="SR" required>
                            </div>
                        </div> -->
                       
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">البيان<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control " name="dis1" placeholder="البيان">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
            <div class="plus-section btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <div  class=" btn btn-info action-btn">اضافة وصف </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <button type="submit" name="button" value="print" class="btn btn-primary action-btn">حفظ وطباعة</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="save" class="btn btn-success action-btn">حفظ</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

<script type="text/javascript">
      var j =1 ;
      console.log(j);

    $('.plus-section').on('click',function () {
        j++;

        $('.add-to').append('<div class="card-header">'  + 
            '<h5 class="mb-0 h6">وصف  '+j+'</h5>'+
            '</div>'  + 
            '<div class="card-body">'+

            '<div class="form-group row">'+
            '<label class="col-md-3 col-from-label">سعر الوحدة</label>' +
            '<div class="col-md-4">'+
            '<input type="number" class="form-control" name="unitI'+j+'" placeholder="H" required>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<input type="number" class="form-control" name="unitJ'+j+'" placeholder="SR" required>' +
            '</div>' +
            '</div>'  +
            '<div class="form-group row">'+
            '<label class="col-md-3 col-from-label">العدد</label>' +
            '<div class="col-md-8">'+
            '<input type="number" lang="en" class="form-control" name="amountI'+j+'" value="1" min="1" required>' +
            '</div>' +
            '</div>'  +
            // '<div class="form-group row">'+
            // '<label class="col-md-3 col-from-label">القيمة الاجمالية</label>'  +
            // '<div class="col-md-4">'        +
            // '<input type="number" class="form-control" name="priceI'+j+'" placeholder="H" required>'     +
            // '</div>'   +
            // '<div class="col-md-4">' +
            // '<input type="number" class="form-control" name="priceJ'+j+'" placeholder="SR" required>' +
            // '</div>' +
            // '</div>' +
          
            '<div class="form-group row">'+
            '<label class="col-md-3 col-from-label">البيان<span class="text-danger">*</span></label>' +
            '<div class="col-md-8">'+
            ' <input type="text" class="form-control " name="dis'+j+'" placeholder="البيان">' +
            '</div>' +
            '</div>' +
            '</div>'           
        );
        $('#addedJ').val(j);
        console.log($('#addedJ').val());
    });
    
    $('form').bind('submit', function (e) {
		if ( $(".action-btn").attr('attempted') == 'true' ) {
			//stop submitting the form because we have already clicked submit.
			e.preventDefault();
		}
		else {
			$(".action-btn").attr("attempted", 'true');
		}
    });
    
    $("[name=shipping_type]").on("change", function (){
        $(".flat_rate_shipping_div").hide();

        if($(this).val() == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }

    });

    function add_more_customer_choice_option(i, name){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url:'{{ route('home') }}',
            data:{
               attribute_id: i
            },
            success: function(data) {
                var obj = JSON.parse(data);
                $('#customer_choice_options').append('\
                <div class="form-group row">\
                    <div class="col-md-3">\
                        <input type="hidden" name="choice_no[]" value="'+i+'">\
                        <input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ translate('Choice Title') }}" readonly>\
                    </div>\
                    <div class="col-md-8">\
                        <select class="form-control aiz-selectpicker attribute_choice" data-live-search="true" name="choice_options_'+ i +'[]" multiple>\
                            '+obj+'\
                        </select>\
                    </div>\
                </div>');
                AIZ.plugins.bootstrapSelect('refresh');
           }
       });


    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')) {
            $('#colors').prop('disabled', true);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        else {
            $('#colors').prop('disabled', false);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        update_sku();
    });

    $(document).on("change", ".attribute_choice",function() {
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    $('input[name="unit_price"]').on('keyup', function() {
        update_sku();
    });

    $('input[name="name"]').on('keyup', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group row').remove();
        update_sku();
    }

    function delete_variant(em){
        $(em).closest('.variant').remove();
    }

    function update_sku(){
        $.ajax({
           type:"POST",
           url:'{{ route('home') }}',
           data:$('#choice_form').serialize(),
           success: function(data) {
                $('#sku_combination').html(data);
                AIZ.uploader.previewGenerate();
                AIZ.plugins.fooTable();
                if (data.length > 1) {
                   $('#show-hide-div').hide();
                }
                else {
                    $('#show-hide-div').show();
                }
           }
       });
    }

    $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function(){
            add_more_customer_choice_option($(this).val(), $(this).text());
        });

        update_sku();
    });

    

</script>

@endsection
