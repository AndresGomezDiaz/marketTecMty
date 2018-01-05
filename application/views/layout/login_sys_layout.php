<!DOCTYPE html>
<html lang="en">
<head>
        <title><?=$title?></title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/css/matrix-login.css" />
        <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="loginbox">
            <?=$contents?>
        </div>
        <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?=base_url()?>assets/js/matrix.login.js"></script>
    </body>
</html>
