<form method="get">
    <input type="text" name="username">
    <input type="submit" name="submit" value="submit">
</form>
<?php
if (isset($_GET['username']) && !empty($_GET['username'])) {
    // with xss attack
    echo ($_GET['username'])."<br>";
    // without xss attack
    echo strip_tags($_GET['username'])."<br>";
    echo htmlentities($_GET['username'])."<br>";
    echo filter_var($_GET['username'],513)."<br>";
}
?>