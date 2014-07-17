<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Reservations</title>

<style>
    

    tr:nth-child(odd)  {    /* to color odd rows of a table */
background:#ccc;
}    

tr:nth-child(even)  {    /* to color odd rows of a table */
background:#99ffff;
}    

td {
    padding:5px;
}
    
</style>
</head>

<body>

<h2 style="margin-bottom:0px; display:inline;">Login</h2>

<form action="login.php" method="POST">
    
    <table>
        <tr><td>User Name:</td><td><input type="text" name="login" value="<?php echo $_POST['login']; ?>"></td></tr>
        <tr><td>Password:</td><td><input type="password" name="password" value="<?php echo $_POST['password']; ?>"></td></tr>
        <tr><td colspan="2"><input type="submit" name="submit" value="Login"></td></tr>
    </table>
    
</form>

<?php

if (isset($_POST['submit']) && $_POST['login'] == 'south' && $_POST['password'] == 'eat3000') {
    include 'admin.php';
} else {
    if (!empty($_POST['login'])) {
    echo 'Incorrect password or login';
    }
}
      
?>


</html>
</body>