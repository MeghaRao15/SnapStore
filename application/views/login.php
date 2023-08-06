<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagename; ?></title>
</head>

<body>
    <h3>Login Form</h3>
    <form method="post" action="<?php echo site_url('Loginc') ?>" >
    <input type="email" placeholder="Enter email" name="email"><br>
    <?= form_error('email')?>
    <input type="text" placeholder="Enter password" name="password"><br>
    <?= form_error('password')?>
    <button type="submit">Submit</button>
    <a href="<?php echo site_url('Loginc/sign') ?>">Sign Up</a>
    </form>
</body>
</html>