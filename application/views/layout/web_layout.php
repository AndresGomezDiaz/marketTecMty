<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assetsWeb/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assetsWeb/style.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assetsWeb/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assetsWeb/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assetsWeb/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assetsWeb/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?=base_url()?>assetsWeb/css/responsive.css" type="text/css" />
    <?=$css_adicional?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url().'assetsWeb/'?>include/rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url().'assetsWeb/'?>include/rs-plugin/css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url().'assetsWeb/'?>include/rs-plugin/css/navigation.css">
    <!-- Document Title
    ============================================= -->
    <title>Market Tec de Monterrey</title>
</head>

<body class="stretched">
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">
        <!-- Header
        ============================================= -->
        <header id="header" class="full-header sticky">
            <div id="header-wrap">
                <div class="container clearfix">
                    <div id="primary-menu-trigger" style="color:#fff; padding-left: 10px;"><i class="icon-reorder icon-2x"></i></div>
                    <!-- Logo
                    ============================================= -->
                    <div id="logo" style="background-color: #004892;">
                        <a href="index.html" class="standard-logo" data-dark-logo="<?=base_url().'assetsWeb/'?>images/tecMty/logo_tec_1.png"><img src="<?=base_url().'assetsWeb/'?>images/tecMty/logo_tec_2.png" alt="Canvas Logo"></a>
                        <a href="index.html" class="retina-logo" data-dark-logo="<?=base_url().'assetsWeb/'?>images/tecMty/logo_tec_1.png"><img src="<?=base_url().'assetsWeb/'?>images/tecMty/logo_tec_2.png" alt="Canvas Logo"></a>
                    </div><!-- #logo end -->
                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">
                        <ul>
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li><a href="<?=base_url().'web_categorias'?>">Causas</a></li>
                            <li><a href="<?=base_url().'web_productos'?>">Productos</a></li>
                        </ul>
                        <!-- Top Cart
                        ============================================= -->
                        <div id="top-cart">
                            <a href="<?=base_url().'web_carrito'?>" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
                        </div><!-- #top-cart end -->
                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="search.html" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Escribe aquí tu busqueda">
                            </form>
                        </div><!-- #top-search end -->
                    </nav><!-- #primary-menu end -->
                </div>
            </div>
        </header><!-- #header end -->
        <!-- Content
        ============================================= -->
        <?=$contents?>
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">
            <br />
            <div class="container clearfix">
                <div class="clear"></div>
                <div class="col_one_third" style="text-align: left; margin-right: 0px; margin-bottom: 10px;">
                    <img src="<?=base_url().'assetsWeb/'?>images/tecMty/tec_logo_blanco.png" width="60%">
                </div>
                <div class="col_one_third" style="text-align: left; margin-right: 0px; margin-bottom: 10px;">
                    <div style="color:#fff;">Siguenos:<br /></div>
                    <a href="https://www.facebook.com/ConectaTECmx" target="_blank"><img src="<?=base_url().'assetsWeb/images/social_media/facebook.png'?>" ></a>&nbsp;&nbsp;&nbsp;
                    <a href="https://twitter.com/ConectaTECmx" target="_blank"><img src="<?=base_url().'assetsWeb/images/social_media/twitter.png'?>" ></a>&nbsp;&nbsp;&nbsp;
                    <a href="https://www.instagram.com/tecdemonterrey/" target="_blank"><img src="<?=base_url().'assetsWeb/images/social_media/instagram.png'?>" ></a>&nbsp;&nbsp;&nbsp;
                    <a href="https://www.youtube.com/TECdeMonterrey" target="_blank"><img src="<?=base_url().'assetsWeb/images/social_media/youtube.png'?>" ></a>&nbsp;&nbsp;&nbsp;
                    <a href="https://www.linkedin.com/school/itesm/" target="_blank"><img src="<?=base_url().'assetsWeb/images/social_media/linkedin.png'?>" ></a>&nbsp;&nbsp;&nbsp;
                    <a href="https://plus.google.com/share?hl=es&url=https%3A%2F%2Fdonar.tec.mx%2F" target="_blank"><img src="<?=base_url().'assetsWeb/images/social_media/google.png'?>" ></a>
                </div>
                <div class="col_one_third col_last" style="text-align: left; margin-right: 0px; margin-bottom: 10px;">

                </div>
                <div class="clear"></div>

                <div class="col_two_third" style="color: #fff; font-size: 1.1rem; margin-right: 0px; margin-bottom: 10px;">
                    Av. Eugenio Garza Sada 2501 Sur Col. Tecnológico C.P. 64849 | Monterrey, Nuevo León, México | Tel.+52 (81)8358-2000<br />
                    D.R. Instituto Tcnológico de Estudios Superiores de Monterry, México 2018
                </div>
                <div class="col_one_third col_last tright" style="color: #fff; font-size: 1.1rem; margin-right: 0px; margin-bottom: 10px;">
                    <br />
                    <a href="<?=base_url().'aviso_legal'?>">Aviso Legal</a> | <a href="<?=base_url().'politica'?>">Politica de privacidad</a> | <a href="<?=base_url().'sobre_sitio'?>">Sobre el sitio</a>
                </div>
            </div>
        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->
    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="<?=base_url()?>assetsWeb/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assetsWeb/js/plugins.js"></script>
    <?=$scriptsJs?>
    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="<?=base_url()?>assetsWeb/js/functions.js"></script>
    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <script type="text/javascript" src="<?=base_url().'assetsWeb/'?>include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?=base_url().'assetsWeb/'?>include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?=base_url().'assetsWeb/'?>include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="<?=base_url().'assetsWeb/'?>include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="<?=base_url().'assetsWeb/'?>include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="<?=base_url().'assetsWeb/'?>include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="<?=base_url().'assetsWeb/'?>include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
</body>
</html>
