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
          displayData();
        }

     });
 }

    </script>


 </body>

</html>
