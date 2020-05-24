<?php
ob_start();
session_start();
require_once 'dbconnect.php';



// select logged-in users details


?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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

    <div class="backgroundcover">
        <div class="backgroundcover-image">
            <img class="studio" src="img/Studioflip.png" alt="">
        </div>
    </div>

    <!---     ###################################        CONTENT   ###################################-->

    <div class="container">
        <div class="introduction">
            <div class="introduction-portrait">
                <img class="aboutme" src="img/aboutmelg.png" alt="Silvia">
            </div>
            <div class="introduction-text">
                <p>Die Pflege der Haut begleitet mich schon seit mehr als dreißig Jahren. Nach dem Gymnasium begann ich meine Ausbildung bei Frau Prof. Harrer, einer Dermatologin, die es sich zum Ziel gesetzt hatte medizinische Kosmetikerinnen auszubilden.
                    Ihr war es wichtig den Focus auf die Gesundheit der Haut zu legen. Deshalb war die Ausbildung sehr stark vom medizinischen Hintergrund geprägt. Das Interesse für die Zusammenhänge im Körper und ihre Auswirkungen auf die Haut hat mich
                    bis heute nicht verlassen. Nach meiner Ausbildung zur Diplomierten Kosmetikerin, leitete ich für sieben Jahre das Estee Lauder Skincare Center in Wien. Nachdem meine Kinder in die Schule kamen, folgten weitere Ausbildungen im Bereich
                    der Schönheitspflege. Ich machte den Abschluß zur Farb- und Stilberaterin und vervollständigte mein Wissen über die Visagistik, indem ich die Ausbildung Zur Maskenbildnerin absolvioerte. Danach arbeitete ich in verschiedenen Kosmetikstudios,
                    war jedoch immer auf der Suche nach einer neuen Herausforderung im Bereich der Medizinischen Kosmetik. Diese fand ich dann bei Univ. Prof. Dr. Jolanta Schmidt, die neben der Kosmetik Ambulanz im AKH eine Privatordination betrieb. Dort
                    leitete ich für fünfzehn Jahre ihr Kosmetikstudio, mit Schwerpunkt Anti Aging und Akne. Im Herbst 2019 entschloss ich mich für den Schritt in die Selbstständigkeit mit meinem „Kosmetikstudio Augustin“. Hier ist mein größtes Anliegen
                    meinen Kundinnen die bestmöglichste Beratung und Behandlung zukommen zu lassen, den Altersprozess der Haut zu verzögern und meinen jungen Klientinnen mit Akne Problemen zu helfen, diese so rasch wie möglich in den Griff zu bekommen.
                    Ich freue mich darauf Sie kennenzulernen! Silvia Augustin</p>
            </div>
        </div>
    </div>
    
    <!---     ###################################        CONTENT   ###################################-->

    <div class="into container-fluid">
        <div class="Über">
            <p class="d-flex justify-content-center pt-5">BEHANDLUNGEN</p>
        </div>
        <div class=" pt-3" >
            <div>
                <div class="row">
                   <div class="col-md col-sm-12">
                         <img id="iconbehandlung" class="mx-auto d-block pt-3" src="img/spa.svg" width="100">
                        <p id="info" class=" d-flex justify-content-center">GESICHT
                        </p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Intensivreinigung für Männerhaut</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Anit Agne Behandlung für den Mann</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Gesichtsenthaarung mit Wachs</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Gesichtsenthaarung mit Epilation</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Augenbrauen färben</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Wimpern färben</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light pb-3">Maniküre mit Klarlack</p>
                    </div>
            
                    <div class="">
                        <div class="line">
                        </div>
                    </div>
                    <div class="col-md col-sm-12">
                        <img id="iconbehandlung"class="mx-auto d-block pt-3" src="img/relax.svg" width="100">
                        <p class=" d-flex justify-content-center" id="info">GANZKÖRPER</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Chemisches Peeling</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Kurze Enspannungsbe-<br>handlung zwischendurch<br> mit Massage und Maske</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light pb-3">Wirkstoffampulle</p>  
                     </div>
                    <div class="">
                        <div class="line"> 
                        </div>
                    </div>
                     <div class="col-md col-sm-12">
                        <img id="" class="mx-auto d-block pt-3" src="img/gender.svg" width="100">
                        <p id="info" class=" d-flex justify-content-center">FÜR DEN MANN</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Intensivreinigung für Männerhaut</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Anit Agne Behandlung für den Mann</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Gesichtsenthaarung mit Wachs</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Gesichtsenthaarung mit Epilation</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Augenbrauen färben</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light">Wimpern färben</p>
                        <p id="fonts" class=" d-flex justify-content-center text-light pb-3">Maniküre mit Klarlack</p>
                    </div>
                </div>
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

<?php ob_end_flush(); ?>