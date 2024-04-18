<?php
include("Includes/config.php");
include("Includes/session.php");

    $name=$_POST['username'];
    $password=$_POST['password'];

$sql="SELECT * FROM `login` WHERE `name`='$name' AND `password`='$password'";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);

if($count>0)
{
    $select=mysqli_fetch_assoc($res);
    $_SESSION['user_id']=$select['id'];
    $_SESSION['user_name']=$select['name'];

if( $select['category']=='admin'){

    header('Location:Admin/index.php');

}
elseif( $select['category']=='user') {
    header('Location:User/home.php');

}
elseif ( $select['category']=='staff') {
    header('Location:Staff/index.php');

}
elseif ( $select['category']=='Dietician') {
    header('Location:Dietician/index.php');

}

}

else{
    echo "<script>alert('Invalid Username or Password');
    window.location='index.php';
    </script>";


}


?>
