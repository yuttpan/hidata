<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="Metro UI CSS">
    <meta name="author" content="Sergey Pimenov">
    <meta name="keywords" content="windows 8, modern style, Metro UI, style, modern, css, framework">

    <link href="css/modern.css" rel="stylesheet">
    <link href="css/modern-responsive.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet" type="text/css">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="js/assets/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/assets/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="js/assets/moment.js"></script>
    <script type="text/javascript" src="js/assets/moment_langs.js"></script>

    <script type="text/javascript" src="js/modern/dropdown.js"></script>
    <script type="text/javascript" src="js/modern/accordion.js"></script>
    <script type="text/javascript" src="js/modern/buttonset.js"></script>
    <script type="text/javascript" src="js/modern/carousel.js"></script>
    <script type="text/javascript" src="js/modern/input-control.js"></script>
    <script type="text/javascript" src="js/modern/pagecontrol.js"></script>
    <script type="text/javascript" src="js/modern/rating.js"></script>
    <script type="text/javascript" src="js/modern/slider.js"></script>
    <script type="text/javascript" src="js/modern/tile-slider.js"></script>
    <script type="text/javascript" src="js/modern/tile-drag.js"></script>
    <script type="text/javascript" src="js/modern/calendar.js"></script>

    <title>Metro UI CSS</title>
</head>
<body class="metrouicss" onload="prettyPrint()">

<div class="page">
<div class="nav-bar">
    <div class="nav-bar-inner padding10">
        <span class="pull-menu"></span>

        <a href="/"><span class="element brand">
            <img class="place-left" src="images/logo32.png" style="height: 20px"/>
            Metro UI CSS <small><?= include("version.phtml")?></small>
        </span></a>

        <div class="divider"></div>

        <ul class="menu">
            <li><a href="/">Home</a></li>
            <li data-role="dropdown">
                <a href="#">Scaffolding</a>
                <ul class="dropdown-menu">
                    <li><a href="global.php">Global styles</a></li>
                    <li><a href="layout.php">Layouts and templates</a></li>
                    <li><a href="grid.php">Grid system</a></li>
                    <li class="divider"></li>
                    <li><a href="responsive.php">Responsive design</a>
                    </li>
                </ul>
            </li>
            <li data-role="dropdown"><a href="#">Base CSS</a>
                <ul class="dropdown-menu">
                    <li><a href="typography.php">Typography</a></li>
                    <li><a href="tables.php">Tables</a></li>
                    <li><a href="forms.php">Forms</a></li>
                    <li><a href="buttons.php">Buttons</a></li>
                    <li><a href="images.php">Images</a></li>
                    <li class="divider"></li>
                    <li><a href="icons.php">Icons</a></li>
                </ul>
            </li>
            <li data-role="dropdown"><a href="#">Components</a>
                <ul class="dropdown-menu">
                    <li><a href="tiles.php">Tiles</a></li>
                    <li><a href="menus.php">Menu and Navigation</a></li>
                    <li><a href="sidebar.php">Sidebar</a></li>
                    <li><a href="pagecontrol.php">Page control</a></li>
                    <li><a href="accordion.php">Accordion</a></li>
                    <li><a href="buttons-set.php">Buttons set</a></li>
                    <li><a href="rating.php">Rating</a></li>
                    <li><a href="progress.php">Progress bars</a></li>
                    <li><a href="carousel.php">Carousel</a></li>
                    <li><a href="listview.php">List view</a></li>
                    <li><a href="slider.php">Slider</a></li>
                    <li><a href="dialog.php">Dialog box</a></li>
                    <li><a href="ajax.php">Ajax reinit</a></li>
                    <li><a href="calendar.php">Calendar</a></li>
                    <li><a href="pagelist.php">Calendar</a></li>
                    <li class="divider"></li>
                    <li><a href="notices.php">Notices and Replies</a></li>
                    <li class="divider"></li>
                    <li><a href="cards.php">Bonus - Deck of Cards</a></li>
                </ul>
            </li>

            <li><a href="https://github.com/olton/Metro-UI-CSS">Source</a></li>
        </ul>

    </div>
</div>
</div>

