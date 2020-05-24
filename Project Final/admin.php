<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require 'admin_function.php';



// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['users'])) {
 header("Location: home.php");
 exit;
}
if (isset($_SESSION['users'])){
    header("Location: home.php");
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE `users_id`=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="admin.css">


<title>Welcome - <?php echo $userRow['name' ]; ?></title>

</head>

<body>
<div class="container-fluid">
<ul class="nav mb-3 d-flex bd-highlight" id="pills-tab" role="tablist">
  <li class="btn p-2 bd-highlight">
    <a class="btn editButton active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Benutzer</a>
  </li>
  <li class="btn p-2 bd-highlight">
    <a class="btn editButton" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Produkte und Behandlungen</a>
  </li>
  <li class="btn ml-auto p-2 bd-highlight">
    <a class="btn editButton" href="logout.php?logout">Log Out</a>
  </li>
</ul> 

<div class="tab-content" id="pills-tabContent">

<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

<table class="table table-striped">

 
<thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Typ</th>
        <th>Bearbeiten/Löschen</th>
    </tr>
</thead>
<tbody>


<?php echo "Willkommen zurück,". " ". $userRow['name' ].". ". "Hier können Sie Ihre Benutzer und ihre Daten verwalten.". "<br>"; 
$sql = "SELECT * FROM users";    

$result = $conn->query('SELECT * FROM users');
while ($row = $result->fetch_assoc()): 
    ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['type']; ?></td>
      <td>
          <a href="admin.php?edit=<?php echo $row['users_id']; ?>" class="btn editButton" >Bearbeiten</a>
          <a href="admin.php?delete=<?php echo $row['users_id']; ?>" class="btn deleteButton">Löschen</a>
      </td>
  </tr>
  
<?php endwhile; ?>

</tbody>


</table>

<?php if($_GET['edit']){ 
    $id=$_GET['edit']; 
    $sql="SELECT * FROM users WHERE users_id={$id}";  
    $result=mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    ?> 

<form action='admin_function.php' method='POST'>
<h3>Bearbeiten<?= $name; ?></h3>
<input type="hidden" name="id" value="<?= $row['users_id']; ?>">
<label for='Name'>Name:</label>
<input type="text" name="name" value="<?= $row['name']; ?>">
<label for="email">Email:</label>
<input type="text" name='email' value="<?= $row['email']; ?>"  >
<label for="type">Typ</label>
<select name="type" id="type">
<?php if($row['type'] == 'user'){ ?>
<option value="user" selected>User</option>
<option value="admin">Admin</option>
<?php } else {
    ?>
<option value="user">User</option>
<option value="admin" selected>Admin</option>
<?php } ?>
</select>

<button type='submit' name='update' id='update'>Update info</button>




</form>

<?php } else{  ?>


<?php } ?>
</div>



<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

<table class="table table-striped">


<thead>
<tr>
    <th>Name</th>
    <th>Bild</th>
    <th>Beschreibung</th>
    <th>Preis (in Euro)</th>
    <th>Typ</th>
    <th>Bearbeiten/Löschen</th>
</tr>
</thead>
<tbody>


<?php 
echo "Hier können Sie Behandlungen und Produkte verwalten."; 
            $sql = "SELECT * FROM product";    
            
            $result = $conn->query('SELECT * FROM product');
            while ($row = $result->fetch_assoc()): 
                ?>
            
                <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['image']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['type']; ?></td>

                <td>
                    <a href="admin.php?editone=<?php echo $row['product_id']; ?>" class="btn editButton" >Bearbeiten</a>
                    <a href="admin.php?deleteone=<?php echo $row['product_id']; ?>" class="btn deleteButton" >Löschen</a>
                </td>
            </tr>
            
            <?php endwhile; ?>

        </tbody>
    </div>
    </table>
    <div class='a_section'>


    <?php if($_GET['editone']){ 
            $id=$_GET['editone']; 
            $sql="SELECT * FROM product WHERE product_id={$id}";  
            $result=mysqli_query($conn, $sql);
            $row=$result->fetch_assoc();  ?> 
      
        <form action='admin_function.php' method='POST'>
        <h3 align='left'>Bearbeitung von <?= $name; ?>:</h3>
            <input type="hidden" name="id" value="<?= $row['product_id'] ?>"><br><br>

            <label for='Name'>Name:</label>
            <input type="text" name="name" value="<?= $row['name'] ?>"><br><br>
            
            <label for="description">Beschreibung:</label>
            <input type="text" name='description' value="<?= $row['description'] ?>"  ><br><br>

            <label for="price">Preis:</label>
            <input type="text" name='price' value="<?= $row['price'] ?>"  ><br><br>

            <label for="image">Bild:</label>
            <input type="text" name="image" id="image" value="<?= $row['image'] ?>" ><br><br>

            <select name="type" id="type">
                <?php if($row['type'] == 'treatment'){ ?>
                <option value="treatment" selected>Behandlung</option>
                <option value="cosmetic">Produkt</option>
                <?php } else {
                    ?>
                <option value="treatment">Behandlung</option>
                <option value="cosmetic" selected>Produkt</option>
                <?php } ?>
                </select>
    
            <button type='submit' name='updateone' id='updateone' class='btn btn-success'>Aktualisieren</button>




        </form>
        <?php } else{  ?>
                


        <?php } ?>

        
       
                <form action='admin_function.php' method='POST'>
                <h3 align='left'>Behandlung oder Produkt erstellen:</h3><br><br>
                <input type="hidden" name="id" value="<?= $id ?>">

                <label for='Name'>Name:</label>
                <input type="text" name="name" value="<?= $name; ?>"><br><br>

                <label for="age">Beschreibung:</label>
                <input type="text" name='description' value="<?= $description; ?>"  ><br><br>

                <label for="price">Preis:</label>
                <input type="text" name='price' value="<?= $price; ?>"><br><br>

                <label for="img">Bild:</label>
                <input type="text" name="image" id="image" value="<?= $image; ?>" ><br><br>

                <select name="type" id="type">
                                <?php if($row['type'] == 'treatment'){ ?>
                                <option value="treatment" selected>Behandlung</option>
                                <option value="cosmetic">Produkt</option>
                                <?php } else {
                                    ?>
                                <option value="treatment">Behandlung</option>
                                <option value="cosmetic" selected>Produkt</option>
                                <?php } ?>
                                </select>




                <button type='submit' name='createone' id='createone' class='btn btn-success'>Erstellen</button>




</form>


</div>  

        </div>
</div>
</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>





