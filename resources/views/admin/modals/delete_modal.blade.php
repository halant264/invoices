
<!-- delete Modal -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">تأكيد الحذف</h4>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">هل انت متأكد من الحذف؟</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-primary mt-2" onclick="link_delete()">حذف</button>
                <!-- <a href="" id="link_delete" class="btn btn-primary mt-2" onclick="link_delete()">{{translate('Delete')}}</a> -->
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<script>

function link_delete() {
            var datar = $('.confirm-delete').attr("data-href");
            console.log(datar);
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: datar,
                type: 'DELETE',
                data: [],
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    // location.reload();

                    if(response == "done") {
                        location.reload();
                    }
                }
            });
        }

</script>
