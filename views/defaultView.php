<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>style.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/css?family=Courgette|Alice|Kalam" rel="stylesheet">
    <!-- BootstrapValidator CSS -->
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrapValidator0.5.0.min.css"/>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>static/Oswald-Bold.ttf"/>

    <!-- BootstrapValidator JS -->
    <script type="text/javascript" src="<?php echo JS_PATH;?>additional-methods.1.16.0.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>bootstrapValidator.0.5.0.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.1.16.0.min.js"></script>
    <!-- Normal JQuery and Bootstrap JS -->
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>bootstrap.min.js"></script>

    <?php if (isset($title)): ?>
        <title><?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>Rheez 1.0</title>
    <?php endif ?>
</head>
<body>
<div>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    if($_SESSION['role'] =='account') //accounting navigation
    {
        include(VIEW_PATH.'account_menu.php');
    }
    elseif($_SESSION['role'] =='admin') //admin navigation
    {
        include(VIEW_PATH.'admin_menu.php');
    }
    elseif($_SESSION['role'] =='general') //General navigation
    {
        include(VIEW_PATH.'general.php');
    }
}
else
{
    include(VIEW_PATH.'right.php');
}
?>
</div>
<div class="container-fluid">
    <?php App::display();?>
    <div class="content"><!--Contents of the site goes here-------------------------------->
        <?php
        if(isset($view)){
            require($view);
        }
        else{
            require('views/template.php');
        }
        ?>
    </div><!--end of content div-->
</div><!-- End of container div-->
<div class="footer">
    Copyright &copy; Rheez Software <?php echo date("Y");?>.  Tel: (<a href="tel:+2348032824378">+234-80328-24378</a>)
</div>
</body>
</html>
