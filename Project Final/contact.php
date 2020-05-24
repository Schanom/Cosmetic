<?php 
require_once "dbconnect.php";
?>
<head>

<title>Kontakt</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">   
<link rel="stylesheet" type="text/css" href="contact.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<!DOCTYPE html>
<html>
<body>
    <div class="container-fluid" id="main">
        <div class="d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
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
 
    <div class="container pb-5" id="field">
        <div class="pt-3 d-flex justify-content-center"><h1>Kontakt</h1></div>
        <br>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6" id="lside">
                <div class="googlemap" style="width:100%; height:350px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d664.9233926091222!2d16.3430335!3d48.1932553!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476da95c82295383%3A0xb6cac32f3da1d568!2sKosmetikstudio%20Augustin%20-%20Kosmetik%20und%20medizinische%20Kosmetik!5e0!3m2!1sde!2sat!4v1587374048221!5m2!1sde!2sat" width="450" height="406" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>    
                </div>
            </div>
        <br>
            <div class="col-sm-6 col-11" id="rside">
                <form class="my-form" action='contactform.php' method='POST'>
                <div class="form-group">
                    <label for="form-name">Name</label>
                    <input type="text" name='name' class="form-control" id="form-name" placeholder="Vor-Nachname">
                </div>
                <div class="form-group">
                    <label for="form-email">Email Adresse</label>
                    <input type="email" name='mail' class="form-control" id="form-email" placeholder="beispiel@bsp.com">
                </div>
                <div class="form-group">
                    <label for="form-subject">Telefonnummer</label>
                    <input type="text" name='number' class="form-control" id="form-subject" placeholder="+43">
                </div>
                <div class="form-group">
                    <label for="form-message">Nachricht</label>
                    <textarea type="text" name='message' class="form-control" id="form-message" placeholder="Text"></textarea>
                </div>
                <button type="submit" name='submit' class="btn">Senden</button></form>
            </div>
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




