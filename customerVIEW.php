<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="customerTRANSACTION.php">CUSTOMER TANSACTION</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customerVIEW.php">CUSTOMER VIEW</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customerID.php">CUSTOMER lOGOUT</a>
    </li>
  </ul>
</nav>
<form method="POST">
<table class="table">
<tr>
<td>
ACCOUNT NO :
</td>
<td>
<input type="text"name="getAccountno"class="form-control">
</td>
</tr>
<tr>
<td>

</td>
<td>
<button type="submit" name="view" class="btn btn-danger">
VIEW DETAILS
</button>
</td>
</tr>
</table>
</form>    
</body>
</html>
<?php
if(isset($_POST["view"]))
{
      $accountno=$_POST["getAccountno"];
  
      $Servername="localhost";
      $Dbusername="root";
      $Dbpassword="";
      $Dbname="customer";
      $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);

      $sql="SELECT   `AMOUNT`, `IFSC CODE` FROM `transaction` WHERE `ACCOUNT NO`=$accountno";
      $result=$connection->query($sql);
      if($result->num_rows>0)
      {
          while($row=$result->fetch_assoc())
          {
              $amountdetails=$row["AMOUNT"];
              $ifsccode=$row["IFSC CODE"];
            

              echo "<table class='table'>
              <tr><td>AMOUNT</td><td><input type='text' value='$amountdetails'> </td></tr>
              <tr><td>IFSC CODE</td><td><input type='text' value='$ifsccode'></td></tr>";
          }
      }
      else{
          echo "invalid";
      }
    

}
?>