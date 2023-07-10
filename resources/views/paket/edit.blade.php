<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT PAKET</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="paket_id">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Paket</label>
                    <input type="text" class="form-control" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Harga Paket</label>
                    <input type="text" class="form-control" id="harga-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-edit-paket', function () {

        let paket_id = $(this).data('id');
        //fetch detail post with ajax
        
       
        $.ajax({
            url: `/paket/${paket_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#paket_id').val(response.data.id);
                $('#name-edit').val(response.data.name_paket);
                $('#harga-edit').val(response.data.harga);
               

                //open modal
                $('#modal-edit').modal('show');
            }
        });
       
    });

    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let paket_id = $('#paket_id').val();
        
        let name   = $('#name-edit').val();
        let harga   = $('#harga-edit').val();
       
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/paket/${paket_id}`,
            type: "PUT",
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
                // let kategoris = `
                //     <tr id="index_${response.data.id_kategori}">
                //         <td>${response.data.name}</td>
                //         <td class="text-center">
                //             <a href="javascript:void(0)" id="btn-edit-kategori" data-id="${response.data.id_kategori}" class="btn btn-primary btn-sm">EDIT</a>
                //             <a href="javascript:void(0)" id="btn-delete-kategori" data-id="${response.data.id_kategori}" class="btn btn-danger btn-sm">DELETE</a>
                //         </td>
                //     </tr>
                // `;
                
                // //append to post data
                // $(`#index_${response.data.id}`).replaceWith(kategoris);

                //close modal
                $('#modal-edit').modal('hide');
                setTimeout(function(){
                    location.reload();
                }, 2000);
                

            },
            error:function(error){
                
                if(error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-name-edit').removeClass('d-none');
                    $('#alert-name-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-name-edit').html(error.responseJSON.title[0]);
                } 

               

            }

        });

    });

</script>

