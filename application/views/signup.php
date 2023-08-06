
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagename; ?></title>
</head>

<body>
    <h3>Signup Form</h3>
    <form method="post" action="<?php echo site_url('Loginc/saveuser') ?>">
        <input type="email" placeholder="Enter email" name="email"><br>
        <?= form_error('email') ?>
        <input type="text" placeholder="Enter password" name="password"><br>
        <?= form_error('password') ?>
        <input type="text" placeholder="Enter Name" name="m_admin_name"><br>
        <?= form_error('m_admin_name') ?>
        <input type="text" placeholder="Enter Contact" name="m_admin_contact"><br>
        <?= form_error('m_admin_contact') ?>
        <button type="submit">Submit</button>
    </form>
</body>
</html>