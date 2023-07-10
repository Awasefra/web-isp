<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{'customer'}}"  method="POST" enctype="multipart/form-data"> 
                
                @csrf
                @method('put')
            <div class="modal-body">

                <input type="hidden" name="id" id="customer_id">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Customer</label>
                    <input type="text" class="form-control" name="name" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Nama Paket</label>
                    <select class="select2 form-control" name="id_paket" id="paket-edit">
                        {{-- <option disabled selected>--pilih kategori--</option> --}}
                         @foreach ($paket as $pakets)
                             <option value="{{ $pakets->id }}">{{ $pakets->name_paket }}</option>
                         @endforeach
                       </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Foto KTP</label>
                    <input type="file" class="form-control" name="foto">
                </br>
                    <div id="insertedImages"></div>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                    <input type="hidden" name="foto_lama" id="file-image">
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-edit-customer', function () {

        let customer_id = $(this).data('id');
        //fetch detail post with ajax
        
       
        $.ajax({
            url: `/customer/${customer_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                var img = '<img src="{{url('img/foto_ktp')}}/'+response.data.foto_ktp+'" width="300" id="insertedImages">';
                $("#insertedImages").html(img);  

                $('#customer_id').val(response.data.id);
                $('#name-edit').val(response.data.nama_customer);
                $('#alamat-edit').val(response.data.alamat);
                $('#paket-edit').val(response.data.id_paket);
                $('#file-image').val(response.data.foto_ktp);
                //open modal
                console.log(response.data.foto_ktp);
                $('#modal-edit').modal('show');
            }
        });
       
    });

    

</script>

