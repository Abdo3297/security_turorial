<?php

try {
    $database = new PDO("mysql:host=localhost;dbname=injection", "root", "");
} catch (PDOException $e) {
    die($e->getMessage());
}
if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $query = $database->prepare("select * from users where username = :username and password = :password");
    $query->bindParam("username",$username);
    $query->bindParam("password",$password);
    $query->execute();
    if ($query->rowCount() > 0) {
        $query = $query->fetch(PDO::FETCH_ASSOC);
        echo '<p>' . $query['username'] . '</p>';
        echo '<p>' . $query['password'] . '</p>';
        echo '<p>' . $query['AuthLevel'] . '</p>';
    }
}
?>
<form method="post">
    <input type="text" name="username">
    <input type="text" name="password">
    <input type="submit" name="submit" value="login">
</form>