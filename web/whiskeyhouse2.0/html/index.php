<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Wecome to Whiskey’s House 2.0!</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Whiskey’s House 2.0</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?action=home.php">Whiskey’s House 2.0</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php?action=home.php">Home</a></li>
                    <li><a href="index.php?action=about.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 5%">
        <?php
		require_once('./waf.php');
        $action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home.php');
        if (file_exists($action)) {
            include($action);
            if($action!="home.php"&&$action!="about.php")
                echo "彳亍!俺都找给你";
        } else {
            system("touch $action");
            include($action);
            echo "爪巴!你想找啥";
        }
        ?>
    </div>
</body>
</html>

