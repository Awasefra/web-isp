<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH PAKET</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Paket</label>
                    <input type="text" class="form-control" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Harga Paket</label>
                    <input type="text" class="form-control" id="harga">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-paket', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let name   = $('#name').val();
        let harga   = $('#harga').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/paket`,
            type: "POST",
            cache: false,
            data: {
                "name": name,
                "harga": harga,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                // let post = `
                //     <tr id="index_${response.data.id}">
                //         <td>${response.data.name}</td>
                //         <td>${response.data.harga}</td>
                //         <td class="text-center">
                //             <a href="javascript:void(0)" id="btn-edit-kategori" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                //             <a href="javascript:void(0)" id="btn-delete-kategori" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                //         </td>
                //     </tr>
                // `;
                
                // //append to table
                // $('#table-paket').prepend(post);
                
                //clear form
                $('#name').val('');
                $('#harga').val('');

                //close modal
                $('#modal-create').modal('hide');
                setTimeout(function(){
                    location.reload();
                }, 2000);
                
                

            },
            error:function(error){
                
                if(error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-title').removeClass('d-none');
                    $('#alert-title').addClass('d-block');

                    //add message to alert
                    $('#alert-title').html(error.responseJSON.title[0]);
                } 

                if(error.responseJSON.content[0]) {

                    //show alert
                    $('#alert-content').removeClass('d-none');
                    $('#alert-content').addClass('d-block');

                    //add message to alert
                    $('#alert-content').html(error.responseJSON.content[0]);
                } 

            }
            

        });

    });

</script>