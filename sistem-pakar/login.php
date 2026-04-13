<h2>Login</h2>

<?php if ($_POST)
    include 'aksi.php'; ?>

<form method="post">
    Username: <input type="text" name="user"><br>
    Password: <input type="password" name="pass"><br>
    <button type="submit">Login</button>
</form>