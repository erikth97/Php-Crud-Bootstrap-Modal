<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP BOOTSTRAP MODAL CRUD </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="completename">name</label>
                        <input type="text" class="form-control" id="completename" 
                          placeholder="Ingresa tu Nombre">
                    </div>
                    <div class="form-group">
                        <label for="completemail">email</label>
                        <input type="email" class="form-control" id="completemail" 
                          placeholder="Ingresa tu Email">
                    </div>
                    <div class="form-group">
                        <label for="completemobile">mobile</label>
                        <input type="text" class="form-control" id="completemobile" 
                          placeholder="Ingresa tu Numero telefonico">
                    </div>
                    <div class="form-group">
                        <label for="completeplace">place</label>
                        <input type="text" class="form-control" id="completeplace" 
                          placeholder="Ingresa tu Ciudad">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="adduser()">Enviar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

<!--Update modal-->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
     aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="updatename">name</label>
                            <input type="text" class="form-control" id="updatename" 
                            placeholder="Ingresa tu Nombre">
                        </div>
                        <div class="form-group">
                            <label for="updateemail">email</label>
                            <input type="email" class="form-control" id="updateemail" 
                            placeholder="Ingresa tu Email">
                        </div>
                        <div class="form-group">
                            <label for="updatemobile">mobile</label>
                            <input type="text" class="form-control" id="updatemobile" 
                            placeholder="Ingresa tu Numero telefonico">
                        </div>
                        <div class="form-group">
                            <label for="updateplace">place</label>
                            <input type="text" class="form-control" id="updateplace" 
                            placeholder="Ingresa tu Ciudad">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="updateDetails()">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <input type="hidden" id="hiddendata">
                    </div>
                </div>
            </div>
        </div>

    <div class="container my-3">
            <h1 class="text-center">PHP CRUD operaciones usando Bootstrap Modal</h1>
            <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#completeModal">
                Agregar nuevo usuario
            </button>
            <div id="displayDataTable"></div> 
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajaxs/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <script>

    $(document).ready(function(){
        displayData();
    });
    // display function
    function displayData(){
        var displayData="true";
        $.ajax({
            url:"display.php",
            type:'post',
            data:{
                displaySend:displayData
            },
            success:function(data,status){
            $('#displayDataTable').html(data);
            }
        });
    }

    function adduser(){
    var nameAdd=$('#completename').val();
    var emailAdd=$('#completemail').val();
    var mobileAdd=$('#completemobile').val();
    var placeAdd=$('#completeplace').val();

    $.ajax({
        url:"insert.php",
        type:'post',
        data:{
                nameSend:nameAdd,
                emailSend:emailAdd,
                mobileSend:mobileAdd,
                placeSend:placeAdd,
        },
        success:function(data,status){
          //funcion para mostar los datos;
          //console.log(status);
          $('#completeModal').modal('hide');

          displayData();
        }

     });
}

//Eliminar Guardados
function DelateUser(delateid){
    $.ajax({
            url:"delete.php",
            type:'post',
            data:{
                deletesend:deleteid
            },
            success:function(data,status){
                displayData();
            }
    });
}

// Update de las funciones
function GetDetails(updateid){
    $('#hiddendata').val(updateid);

    $.post("update.php",{updateid:updateid},function(data,status){
        var userid=JSON.parse(data);
        $('#updatename').val(userid.name);
        $('#updateemail').val(userid.email);
        $('#updatemobile').val(userid.mobile);
        $('#updateplace').val(userid.place);

    });

    $('#updateModal').modal("show");
}


//funcion para actualizar evento onclick 
function updateDetails(){
    var updatename=$('#updatename').val();
    var updateemail=$('#updateemail').val();
    var updatemobile=$('#updatemobile').val();
    var updateplace=$('#updateplace').val();
    var hiddendata=$('#hiddendata').val();

    console.log("MODIFICAR")
    $.ajax({
            url:"update.php",
            type:'post',
            data:{
                updatename:updatename,
                updateemail:updateemail,
                updatemobile:updatemobile,
                updateplace:updateplace,
                hiddendata:hiddendata          
            },
            success:function(data,status){
                   $('#updateModal').modal('hide');
                displayData();
            }
    });

}
    </script>

 </body>

</html>
