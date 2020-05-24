<?php 

require_once 'dbconnect.php';

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE users_id=$id") or die($conn->error());
    unset($_SESSION['message']);
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

}

$update = false;

if (isset($_GET['edit'])){
    $udpate = true;
    $id = $_GET['edit'];
    $sql = "SELECT * FROM users WHERE users_id=$id";
    $res = mysqli_query($conn, $sql);
    if($res->num_rows){
        $row = $res->fetch_array();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $type = $row['type']; // could be a mistake from mike
    }
   
}

if (isset($_POST['update'])){
    $update=false;
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $type = $_POST['type'];  // could be a mistake from mike
        $sql = "UPDATE users SET `name`='$name', `email`='$email', `type`='$type' WHERE users_id=$id" ;

    $res = mysqli_query($conn, $sql);
    
    header('location: admin.php');

}

//update shit

if (isset($_GET['deleteone'])){
    $id = $_GET['deleteone'];
    $conn->query("DELETE FROM product WHERE product_id={$id}") or die($conn->error());


    // unset($_SESSION['message']);
    // $_SESSION['message'] = "Record has been deleted";
    // $_SESSION['msg_type'] = "danger";

}

$update = false;

if (isset($_GET['editone'])){
    $udpate = true;
    $id = $_GET['editone'];
    $sql = "SELECT * FROM product WHERE product_id=$id";
    $res = mysqli_query($conn, $sql);
    if($res->num_rows){
        $row = $res->fetch_array();
        $id = $row['id'];
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];
        $type = $row['type'];  // still could be an error have a look at html code
    }
}

if (isset($_POST['updateone'])){
    $update=false;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $sql = "UPDATE product SET `name`='$name', `image` ='$image', `type`='$type' WHERE product_id={$id}";
    $result = mysqli_query($conn, $sql);

header('location: admin.php');
}


//creating a new product


$create = false;

if (isset($_GET['create'])){
    $create = true;
}

if (isset($_POST['createone'])){
    $create=true;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $sql = "INSERT INTO `product` (`name`, `image`, `price`, `type`) VALUES ('$name', '$image', '$price', '$type')";

$result = mysqli_query($conn, $sql);

header('location: admin.php');
}
?>

