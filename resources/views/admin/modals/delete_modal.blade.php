 <!-- delete Modal  -->
<div id="delete-modal" class="modal fade "> 
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">تأكيد الحذف</h4>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">هل انت متأكد من الحذف؟</p>
                <form action="" method="POST">
                     <button type="button" class="btn btn-link mt-2" data-dismiss="modal">الغاء</button>
                     @csrf
                     @method('DELETE')
                  <button type="submit" class="btn btn-primary mt-2"  onclick="linkdelete()" >حذف</button>
                </form>
            </div>
        </div>
    </div>
</div> 

<script type="text/javascript">
     let v = '' ;
     $(document).on('click', '.c-d', function () {
         v = $(this).attr("data-href");
         console.log(v);
         $('form').attr('action' ,  v );

     });  
</script>

<script>

// function link_delete() {
//             var datar = $('.confirm-delete').attr("data-href");
//             console.log($('meta[name="csrf-token"]').attr('content'));
//             $.ajax({
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//                 url: datar,
//                 dataType: "json",
//                 type: 'DELETE',
//                 data: [],
//                 cache: false,
//                 contentType: false,
//                 processData: false,
//                 success: function (response) {
//                     if(response == "done") {
//                         location.reload();
//                     }
//                 }
//             });
//         }
// </script>
