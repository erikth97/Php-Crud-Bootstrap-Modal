<?php
include 'connect.php';
if(isset($_POST['displaySend'])){
    $table='<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Sl no</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Operations</th>
      </tr>
      </thead>';
      $sql="Select from `crud`";
      $result=mysqli_query($con,$sql);
      while($row=mysqli_fetch_assoc($result)){
          $table.='<tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
         </tr>';
      } 
}

?>
