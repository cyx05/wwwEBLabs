<?php
function redirectToHome():void{
    header('Location: index.php');
    exit();
}

if (false === isset($_POST['email'], $_POST['title'], $_POST['description'])){
    redirectToHome();
}
$category = $_POST['category'];
$title = $_POST['title'];
$descript = $_POST['description'];
$email = $_POST['email'];
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');
if (mysqli_connect_errno()) {
    printf('Can not connect to mysql sever.Error code: %s', mysqli_connect_errno());
    exit;
}
$mysqli->query("INSERT INTO ad (email, title, description, category) VALUES ('$email', '$title', '$descript', '$category')");
$mysqli->close();

redirectToHome();
