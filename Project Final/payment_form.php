<?php
require_once 'dbconnect.php';
session_start();
$connect = new mysqli("localhost", "root", "", "cosmetic");
include "payment.php";
use Payment\Payment;
$payment = new Payment;
// ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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

<div class="container" style="height: 50vh;">
           <form class="form-horizontal" method="POST" action="https://www.sandbox.PayPal.com/cgi-bin/webscr ">
               <fieldset>
                   <!-- Form Name -->
                   <h2 class="d-flex justify-content-center mt-5">Bezahlung mit PayPal</h2>
                   <!-- Text input-->
                   <h4 class="d-flex justify-content-center">Zu zahlender Betrag:</h4>
                   <h3 class="d-flex justify-content-center"><b>€ <?= $_SESSION["total"]  ?>,-</b></h3>
                   <div class="form-group d-flex justify-content-center">
                       <div>
                         <input id="amount" name="amount" type="hidden" value="<?= $_SESSION['total'] ?>" class="form-control input-md" required="">
                       </div>
                   </div>
                   <input type='hidden' name='business' value='sb-7j4hl606677@personal.example.com'>
                   <input type='hidden' name='item_name' value='Camera'>
                   <input type='hidden' name='item_number' value='CAM#N1'>
                   <!--<input type='hidden' name='amount' value='10'>-->
                   <input type='hidden' name='no_shipping' value='1'>
                   <input type='hidden' name='currency_code' value='USD'>
                   <input type='hidden' name='notify_url' value='<?php echo $payment->route("notify", "") ?>'>
                   <input type='hidden' name='cancel_return' value='<?php echo $payment->route("payment_form.php", "") ?>'>
                   <input type='hidden' name='return' value='<?php echo $payment->route("return", "payment_form.php") ?>'>
                   <input type="hidden" name="cmd" value="_xclick">
                   <!-- Button -->
                   <div class="form-group">
                       <label class="control-label" for="submit"></label>
                       <div class="d-flex justify-content-center">
                         <button id="submit" name="pay_now" class="btn btn-success">Bestellung Abschließen</button>
                       </div>
                   </div>
               </fieldset>
           </form>
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