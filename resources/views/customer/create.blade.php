<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('customer')}}" method="POST" enctype="multipart/form-data"> 
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Customer</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Harga Paket</label>
                    <select class="select2 form-control" name="paket" id="paket">
                        <option disabled selected>--pilih paket--</option>
                         @foreach ($paket as $pakets)
                             <option value="{{ $pakets->id }}">{{ $pakets->name_paket }}</option>
                         @endforeach
                       </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Foto KTP</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-customer', function () {

        //open modal
        $('#modal-create').modal('show');
    });

</script>