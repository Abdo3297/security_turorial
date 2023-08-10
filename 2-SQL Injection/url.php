<?php

try {
    $database = new PDO("mysql:host=localhost;dbname=injection", "root", "");
} catch (PDOException $e) {
    die($e->getMessage());
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $id = filter_var($_GET['id'],519);
    $query = $database->prepare("select * from users where id=:id");
    $query->bindParam("id",$id);
    $query->execute();
    if ($query->rowCount() > 0) {
        $query = $query->fetch(PDO::FETCH_ASSOC);
        echo '<p>' . $query['username'] . '</p>';
        echo '<p>' . $query['password'] . '</p>';
        echo '<p>' . $query['AuthLevel'] . '</p>';
    }
}
?>