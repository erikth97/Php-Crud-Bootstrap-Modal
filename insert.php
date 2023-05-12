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
        <th scope="col">Place</th>
        <th scope="col">Operation</th>
      </tr>
      </thead>';
      $sql="Select * from `crud`";
      $result=mysqli_query($con,$sql);
      while($row=mysqli_fetch_assoc($result)){
          $id=$row['id'];
          $name=$row['name'];
          $email=$row['email'];
          $mobile=$row['mobile'];
          $place=$row['place'];
          $table.='<tr>
          <td scope="row">'.$id.'</td>
          <td>'.$name.'</td>
          <td>'.$email.'</td>
          <td>'.$mobile.'</td>
          <td>'.$place.'</td>
          <td>
          <button class="btn btn-dark">Update</button>
          <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
          </td>
          </tr>';
      } 
      $table.='</table>';
      echo $table;

}


?>
