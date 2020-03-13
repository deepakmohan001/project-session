<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
<table class="table">
<tr>
<td>
USER NAME
</td>
<td>
<input type="text" name="getNAME" class="form-control">
</td>
</tr>
<tr>
<td>
PASSWORD
</td>
<td>
<input type="password" name="getPASSWORD" class="form-control">
</td>
</tr>
<tr>
<td>

</td>
<td>
<button type="submit" name="submit" class="btn btn-danger">SUBMIT</button>
</td>
</tr>
</table>
</form>    
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
    $Name=$_POST["getNAME"];
    $Password=$_POST["getPASSWORD"];
    
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="customer";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);

    $sql="SELECT * FROM `customer` WHERE `USER NAME`='$Name'and`PASSWORD`='$Password'";
    $result=$connection->query($sql);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            header('Location:customerTRANSACTION.php');
        }
    }
    else
    {
        echo"failed";
    }
}
?>
