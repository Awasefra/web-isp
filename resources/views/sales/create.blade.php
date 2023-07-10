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
                    <label for="name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="username" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Nama Sales</label>
                    <input type="text" class="form-control" id="name" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Password</label>
                    <input type="text" class="form-control" id="password" required>
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
    $('body').on('click', '#btn-create-sales', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let username   = $('#username').val();
        let name   = $('#name').val();
        let password   = $('#password').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/sales`,
            type: "POST",
            cache: false,
            data: {
                "username": username,
                "name": name,
                "password" : password,
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

                // data post
                let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.username}</td>
                        <td>${response.data.name}</td>
                        <td class="text-center">
                            
                            <a href="javascript:void(0)" id="btn-delete-sales" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-sales').prepend(post);
                
                //clear form
                $('#name').val('');
                $('#username').val('');
                $('#password').val('');

                //close modal
                $('#modal-create').modal('hide');
               
                
                

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