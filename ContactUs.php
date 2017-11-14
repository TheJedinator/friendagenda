<?php 
//Variables containing the information 
$address = "26 Duffie Drive. Fredericton, NB E3B 0R6";
$phone = "(506) 453-3641";
$email = "jed@palmater.ca";
?>

    <html>


    <head>
        <title>Contact Us - FA (JP)</title>
        <link rel="shortcut icon" href="/favicon.ico">

    </head>
    <meta name="description" content="Friend Agenda,Contact Us!" />
    <meta name="author" content="Jed Palmater, jed@palmater.ca" />
    <style type="text/css">
        <!-- body {
            background-image: url(bg/bg3.jpg);
            background-repeat: repeat-x;
            background-color: #d9deeb;
        }
        
        -->
    </style>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
        
    <link href="css/contact.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="img/icon.png" type="image" />

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
    <link href="facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/example.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="facebox1.2/src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox()
            closeImage: " ../src/closelabel.png"
        })
    </script>


    <script>
        !window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
    </script>
    <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript">
        $(document).ready(function() {

            $("a#example2").fancybox({
                'overlayShow': false,
                'transitionIn': 'elastic',
                'transitionOut': 'elastic'
            });

            $("a[rel=example_group]").fancybox({
                'transitionIn': 'none',
                'transitionOut': 'none',
                'titlePosition': 'over',
                'titleFormat': function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
            });
        });
    </script>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <!--datepicker -->
    <link href="css/datepicker/ui.datepicker.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="js/datepicker/ui.datepicker.js"></script>
    <!--datepicker -->
    <script type="text/javascript" charset="utf-8">
        jQuery(function($) {
            $(".date").datepicker();
        });
    </script>

    <body>
        <div class="mainr">

            <div class="topleft"> <img src="img/logo.png" width="200" height="60" /></a>
            </div>

            <iframe width="600" height="450" frameborder="0" style="border:0; padding-bottom 80px" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDHGHQ7AkC0j7RaB6U694OvaxBYu8IJfXk
            &q=NBCC" allowfullscreen>
            </iframe>
<div style=" display: block; float: right;">
        <div style="padding-top: 175px; display: flex; ">
            <TABLE BGCOLOR="#FFFFFF">
                <TR>
                    <TD style="color:blue" ALIGN="CENTER" VALIGN="MIDDLE">
                        <b>The Friend Agenda Company inc.</b>
                    </TD>
                </TR>
                <TR>
                    <TD ALIGN="CENTER" VALIGN="MIDDLE">
                        <b>Address:</b>
                        <?php echo $address ?>
                    </TD>
                </TR>
                <TR>
                    <TD ALIGN="CENTER" VALIGN="MIDDLE">
                        <b>Phone:</b>
                        <?php echo $phone ?>
                    </TD>
                </TR>
                <TR>
                    <TD ALIGN="CENTER" VALIGN="MIDDLE">
                        <b>e-Mail:</b> <a href="mailto:jed@palmater.ca">jed@palmater.ca</a>
                    </TD>
                </TR>
            </TABLE>
        </div>
        </div>
        </div>
        <?php include("Include/Footer.php"); ?>
    </body>

    </html>