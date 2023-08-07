<?php
$hashed_password = password_hash('abdo hassan', PASSWORD_DEFAULT, ['cost' => 10]);
?>

<form method="post">
    <input type="password" name="password">
    <input type="submit" value="match" name="submit">
</form>
<?php
if (isset($_POST['submit']) && !empty($_POST['password'])) {
    $password = $_POST['password'];
    if (password_verify($password, $hashed_password)) {
        echo 'The password is correct.';
    } else {
        echo 'The password is incorrect.';
    }
}
