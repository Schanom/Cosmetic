<?php 
require_once 'dbconnect.php';
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
	}
	else {
		$row = $res->fetch_assoc();
		$qtty = $row["qtty"]+ 1;
		$sqlupdateProduct = "UPDATE cart SET qtty = $qtty WHERE fk_product = {$id}";
		$result2 = mysqli_query($connect, $sqlupdateProduct);
	}
}
if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$connect->query("DELETE FROM cart WHERE fk_product={$id}") or die($connect->error());
	unset($_SESSION['message']);
	$_SESSION['msg_type'] = "danger";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Einkaufswagen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="cart.css">
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
                    <a href="cart.php"><img class="pt-5 pr-4 pl-4 mx-auto d-block"height="80" id="lol" src="icons/shopping.svg"alt="facebook"></a>
                    </li>
                    <li class="nav-item">
                        <a class="pt-5 d-flex pl-4 pr-4 justify-content-center" id="login" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<a class="d-flex pt-2 pr-4 justify-content-end" id="login" href="logout.php?logout">Sign Out</a>
<br>
<h1 class="d-flex justify-content-center mb-5 ">Bestellübersicht</h1>
	<div class="table-responsive" style="height: 45vh;">
		<table class="table talbe-borded">
			<?php 
			$sql = "SELECT * FROM cart inner join product on fk_product = product_id WHERE fk_user_id = {$_SESSION['users']}";
			$res = mysqli_query($connect , $sql);
			if($res->num_rows == 0)
				{
				echo "<h3 class='d-flex justify-content-center'>
						<u>Noch kein Produkt hinzugefügt</u>
					 </h3>
					 <br>
					 <p class='mb-5'>
					 <a class='d-flex justify-content-center' id='über' href='products.php'>Hier geht es zur Produktübersicht</a>
					 </p>
					 </table>";

				}
			elseif($res->num_rows == 1)
				{
				$row = $res->fetch_assoc();
				$totalPrice = 0; 
				$cartTotal = $row["qtty"] * $row["price"];
				$_SESSION["total"]=$cartTotal;
				?>
				<tr>
					<th width="40%"><h4>Produkt Name</h4></th>
					<th width="10%">Anzahl</th>
					<th width="10%">Einzelpreis</th>
					<th width="15%">Gesamtpreis</th>
					<th width="5%">Action</th>
				</tr>
				<tr>
					<td><?php echo $row ["name"]; ?></td>
					<td><?php echo $row ["qtty"]; ?></td>
					<td><?php echo $row ["price"]; ?></td>
					<td>€ <?php echo number_format($row["qtty"] * $row["price"], 2); ?>,-</td>
					<td><a href="cart.php?delete=<?php echo $row['product_id']; ?>"><span class="text-danger">Entfernen</span></a></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><b>€ <?php echo $cartTotal ?>,-</b></td>
					<td><a href="payment_form.php">Kaufen</a></td>
				</tr>
			</table> 
			<?php
				}
			else 
				{
				$rows = $res->fetch_all(MYSQLI_ASSOC);
				$totalPrice = 0;
			?>
				<tr>
					<th width="40%"><h4>Produkt Name</h4></th>
					<th width="10%">Anzahl</th>
					<th width="10%">Einzelpreis</th>
					<th width="15%">Gesamtpreis</th>
					<th width="5%">Action</th>
				</tr>
			<?php
				foreach ($rows as  $row) 
					{ 
			?>

				<tr>
					<td><?php echo $row ["name"]; ?></td>
					<td><?php echo $row ["qtty"]; ?></td>
					<td><?php echo $row ["price"]; ?></td>
					<td>€ <?php echo number_format($row["qtty"] * $row["price"], 2); ?>,-</td>
					<td><a href="cart.php?delete=<?php echo $row['product_id']; ?>"><span class="text-danger">Entfernen</span></a></td>
				</tr> 
				<?php
					}
					$total  = "SELECT price, qtty  FROM cart inner join product on fk_product = product_id WHERE fk_user_id = {$_SESSION['users']}";
					$result = mysqli_query($connect, $total);
					while ($row = $result->fetch_assoc()) 
						{
						$cartTotal = $cartTotal + ($row["price"] * $row["qtty"]);
						} 
					$_SESSION["total"]= $cartTotal;
				?>
				<tr>
					<td>
						<?php if (isset($_GET['delete']))
							{
							$id = $_GET['delete'];
							$connect->query("DELETE FROM cart WHERE fk_product={$id}") or die($connect->error());
							unset($_SESSION['message']);
							//echo $_SESSION['message'] = "<u>Produkt wurde von Einkaufswagen entfernt</u>";
							$_SESSION['msg_type'] = "danger";
							}
						 ?>
					</td>
					<td></td>
					<td></td>
					<td><b>€ <?php echo $cartTotal ?>,-</b></td>
					<td><a href="payment_form.php">Kaufen</a></td>
				</tr>
		</table>
				<?php
				}
				?>
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