<!-- Modal -->
<div class="modal fade" id="modal-insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('insert-foto')}}" id="update-foto" method="POST" enctype="multipart/form-data"> 
                @csrf
                {{-- @method('put') --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
                    <div class="modal-body">
                        
                        <input type="hidden" name="id" id="customerr_id">

                        <div class="form-group">
                            <label for="name" class="control-label">Nama Customer</label>
                            <input type="text" class="form-control" name="name" id="names-edit" disabled>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Foto KTP</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                        </div>
                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="submit" class="btn btn-primary" id="updates">UPDATE</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-tambah-foto', function () {
        let customer_id = $(this).data('id');
        
        //fetch detail post with ajax
        
       
        $.ajax({
            url: `/customer/${customer_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#customerr_id').val(response.data.id);
                $('#names-edit').val(response.data.nama_customer);
                            

                //open modal
                $('#modal-insert').modal('show');
            }
        });
       
    });

</script>

