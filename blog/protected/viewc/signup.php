<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>New User Registration</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="Shortcut Icon" href="http://doophp.com/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo $data['rootUrl']; ?>global/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $data['rootUrl']; ?>global/css/demo.css" media="screen" />


</head>
<body>

<div id="wrap">

<?php include Doo::conf()->SITE_PATH .  Doo::conf()->PROTECTED_FOLDER . "viewc//top.php"; ?>

<div id="content">
        <h1>UserManager :: <?php echo $data['pagetitle']; ?></h1>

        <p>User Registration - Enter details.</p>

		<?php if( isset($data['errorMsg'])==true ): ?>
		<p class="error">Error: <?php echo $data['errorMsg']; ?></p>
		<?php endif; ?>

		<?php if( isset($data['successMsg'])==true ): ?>
		<p class="success">Success: <?php echo $data['successMsg']; ?></p>
		<?php endif; ?>

        <form  method="POST" action="<?php echo $data['rootUrl']; ?>saveNewUser">
        <table style="margin-left:200px;"><tr><td>
            <label for="username">Username</label></td><td>
            <input type="text" name="username" /></td></tr>
<tr><td>
            <label for="password">Password</label></td><td>
            <input type="password" name="password" /></td></tr>
<tr><td>
            <label for="first_name">First Name</label></td><td>
            <input type="text" name="first_name" /></td></tr>
<tr><td>
            <label for="last_name">Last Name</label></td><td>
            <input type="text" name="last_name" /></td></tr>
<tr><td>
            <label for="email">Email</label></td><td>
            <input type="text" name="email" /></td></tr>
<tr><td>
            <input type="submit" value="Signup" /></td><td>
            </td></tr>
            </table>
        </form>
        <p>
            Already registed for an account?
            <a href="<?php echo $data['app_url']; ?>login/">Login Now!</a>
        </p>
        <div style="clear: both;"> </div>
		</div>

		<div id="bottom"> </div>

		    <div id="footer">
		        Powered by <a href="http://www.doophp.com/">DooPHP framework</a>, for educational purpose.
		    </div>
		</div>

		</body>
</html>