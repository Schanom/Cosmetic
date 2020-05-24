<?php 
session_start();
$connect = new mysqli("localhost", "root", "", "cosmetic");
if (isset($_POST["add_to_cart"])) 
{
	$id = $_POST["id"];
	$sqlcheckProduct = "SELECT * FROM cart WHERE fk_product = {$id}";
	$res = mysqli_query($connect,$sqlcheckProduct);
	if($res->num_rows == 0){
		$sql = "INSERT INTO cart (fk_product, fk_user_id, qtty) VALUES ({$id},{$_SESSION['users']},1)";
		$result = mysqli_query($connect,$sql);

	}else {
		$row = $res->fetch_assoc();
		$qtty = $row["qtty"]+ 1;
		$sqlupdateProduct = "UPDATE cart SET qtty = $qtty WHERE fk_product = {$id}";
		$result2 = mysqli_query($connect, $sqlupdateProduct);

	}

}


if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    echo $connect->query("DELETE FROM cart WHERE fk_product={$id}") or die($connect->error());
    unset($_SESSION['message']);
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Produkte</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="products.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid" id="main">
        <div class="d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="pt-5 pr-3 pl-3 d-flex justify-content-center" id="über" href="home.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="pt-5 pr-3 pl-3 d-flex justify-content-center" id="über" href="products.php">Produkte</a>
                    </li>
                    <li class="nav-item">
                        <a class="pt-5 d-flex pl-3 pr-3 justify-content-center" id="über" href="contact.php">Kontakt</a>
                    </li>
                <div id="logo1">
                    <li class="nav-item">
                        <a href="home.php"><img class="d-flex justify-content-center" id="navlogo" src="img/gold.svg" width="350" alt="Logo Thing main logo"></a>
                    </li>
                </div>
                    <li  class="d-flex justify-content-center">
                        <a href="https://www.facebook.com/kosmetikstudioaugustin/?modal=admin_todo_tour"><img class="pt-5 pl-4 pr-4 mx-auto d-block"height="80" id="lol" src="icons/facebook.svg" alt="facebook"></a>
                        <a href="#"><img class="pt-5 pr-4 pl-4 mx-auto d-block"height="80" id="lol" src="icons/instagram.svg" alt="instagram"></a>
                    </li>
                    <li class="d-flex justify-content-center">
                        <a href="cart.php"><img class="pt-5 pr-4 pl-4 mx-auto d-block"height="80
                        " id="lol" src="icons/shopping.svg" alt="facebook"></a>
                    </li>
                    <li class="nav-item">
                        <a class="pt-5 d-flex pl-4 pr-4 justify-content-center" id="login" href="login.php">Login</a>
                    </li>
                </ul>
                </div>
            </nav>
        </div>
    </div>
<div class="container-fluid content">
<br>
    <h1 class="d-flex justify-content-center pl-2 pr-2 mt-5" id="Headline">Produktübersicht</h1><br>
    <div class="row justify-content-around">
            <?php 
            $query = "SELECT * FROM product ORDER BY product_id ASC";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
             ?>
             <div class="card p-0 mw-100 col-xl-3 col-lg-4 col-md-4 col-sm-10 col-9" align='center'>
                <form class="" method="post" action="products.php?action=add&product_id=<?php echo $row["product_id"]; ?>">
                    <img class="card-img-top m-0 p-2" src="<?php echo $row["image"]; ?>" alt="Card image top">
                    <div class="card-body">
                        <h3>
                        <?php echo $row['name']; ?>
                        </h3>
                        <h4 class="sum">€ <?php echo $row["price"]; ?></h4>
                        <input type="hidden" name="id" value="<?php echo $row["product_id"]; ?>">
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Hinzufügen">
                    </div>
                </form>
             </div>
         <?php 
                }
            }
         ?>
    </div>
</div>


<footer>
    <div class="container-fluid p-0">
        <div class="nav d-flex justify-content-center p-0 ">
            <div class="footeradress">
                <div class="adress">
                    <p>Termine <br>nach Vereinbarung</p>
                </div>
                <div class="footerlogo">
                    <img src="img/logo.svg" alt="">
                </div>
                <div class="footerimpressum">
                    <p>Impressum</p>
                    <p>Datenschutzerklärung</p>
                </div>
            </div>

        </div>
        <div class="container-fluid pl-0 pr-0">
            <div class="subfooteradress pt-3 pb-3">
                <div class="adressb pt-2">
                    <p>© 2020 AUGUSTIN KOSMETIK | KONZEPT & DESIGN M.A.T.E</p><br>
                </div>
                <div class="socialmedia">
                    <img class="fb" src="icons/facebook.svg" alt="facebook">
                    <img class="ig" src="icons/instagram.svg" alt="instagram">
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>