<h1>REGISTER NEW USER</h1>

<?php /** @var array $errors |null */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post">
    <label>
        Email: <input type="email" name="email"/> <br />
    </label>
    <label>
        Password: <input type="text" name="password"/> <br />
    </label>
    <label>
        Confirm Password: <input type="text" name="confirm_password"/> <br />
    </label>
    <label>
        Name: <input type="text" name="name"/><br />
    </label>
    <label>
        Phone: <input type="text" name="phone"/><br />
    </label>
    <input type="submit" name="register" value="Register"/> <br />

</form>

<a href="index.php">back</a>