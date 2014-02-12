<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Login</title>
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
        <br /><br />
<h2>
Logged in as :: <?php echo $data['username']; ?>
</h2><br /><br />

        <p>
            Not <?php echo $data['username']; ?>?
            <a href="<?php echo $data['app_url']; ?>logout/">Logout!</a>
        </p>

        <p>
		            Remove User?
		            <a href="<?php echo $data['app_url']; ?>removeUser/">Delete User <?php echo $data['username']; ?></a>
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