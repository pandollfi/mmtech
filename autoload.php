<?php
class Autoload
{
    public static function carrega_sistema()
    {
        Autoload::carrega_const();
        Autoload::carrega_css();
        Autoload::carrega_js();
        Autoload::carrega_db();
        Autoload::carrega_funcoes();
    }

    public static function carrega_const()
    {
        $PASTA_PROJETO = "mmtech/";
        $PASTA_RAIZ = $_SERVER['DOCUMENT_ROOT'] . "/" . $PASTA_PROJETO;

        define("RAIZ", $PASTA_RAIZ);
        define("LIB", $PASTA_RAIZ . "lib/");
        define("ADMIN", $PASTA_RAIZ . "admin/");
        define("URL", "http://localhost/" . $PASTA_PROJETO);
        define("URL_ADMIN", URL . "admin/");
    }

    public static function carrega_css_site()
    {
        echo '
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="' . URL . 'plugins/blizzard/aos/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="' . URL . 'plugins/blizzard/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="' . URL . 'plugins/blizzard/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="' . URL . 'plugins/blizzard/boxicons/css/boxicons.min.css" >
        <link rel="stylesheet" href="' . URL . 'plugins/blizzard/glightbox/css/glightbox.min.css" >
        <link rel="stylesheet" href="' . URL . 'plugins/blizzard/swiper/swiper-bundle.min.css" >
        <link rel="stylesheet" href="' . URL . 'plugins/blizzard/style.css" ">';
    }

    public static function carrega_js_site()
    {
        echo '
        <script src="' . URL . 'plugins/blizzard/purecounter/purecounter.js"></script>
        <script src="' . URL . 'plugins/blizzard/aos/aos.js"></script>
        <script src="' . URL . 'plugins/blizzard/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="' . URL . 'plugins/blizzard/glightbox/js/glightbox.min.js"></script>
        <script src="' . URL . 'plugins/blizzard/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="' . URL . 'plugins/blizzard/swiper/swiper-bundle.min.js"></script>
        <script src="' . URL . 'plugins/blizzard/waypoints/noframework.waypoints.js"></script>
        <script src="' . URL . 'plugins/blizzard/php-email-form/validate.js"></script>
        <script src="' . URL . 'plugins/blizzard/main.js"></script>';
    }

    public static function carrega_css()
    {
        echo '
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="' . URL . 'plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="' . URL . 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="' . URL . 'plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="' . URL . 'plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="' . URL . 'dist/css/adminlte.min.css">
        <link rel="stylesheet" href="' . URL . 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="' . URL . 'plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="' . URL . 'plugins/summernote/summernote-bs4.min.css">';
    }

    public static function carrega_js()
    {
        echo '
        <script src="' . URL . 'dist/js/jquery.min.ajax.js"></script>
        <script src="' . URL . 'dist/js/jquery.min.js"></script>
        <script src="' . URL . 'dist/js/jquery-3.6.0.min.js"></script>
        <script src="' . URL . 'dist/js/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="' . URL . 'plugins/jquery/jquery.min.js"></script>
        <script src="' . URL . 'plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="' . URL . 'plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="' . URL . 'plugins/chart.js/Chart.min.js"></script>
        <script src="' . URL . 'plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="' . URL . 'plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="' . URL . 'plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="' . URL . 'plugins/moment/moment.min.js"></script>
        <script src="' . URL . 'plugins/daterangepicker/daterangepicker.js"></script>
        <script src="' . URL . 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="' . URL . 'plugins/summernote/summernote-bs4.min.js"></script>
        <script src="' . URL . 'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="' . URL . 'dist/js/adminlte.js"></script>
        <script src="' . URL . 'dist/js/demo.js"></script>
        <script src="' . URL . 'dist/js/pages/dashboard.js"></script>
        <script src="' . URL . 'js/funcoes.js"></script>
        <script src="' . URL . 'js/busca.js"></script>
        <script src="' . URL . 'js/login.js"></script>
        <script src="' . URL . 'js/mask.js"></script>
        <script src="' . URL . 'js/jquery-1.2.6.pack.js"></script>
        <script src="' . URL . 'js/jquery.maskedinput-1.1.4.pack.js"/></script>
        <script src="' . URL . 'js/jquery.maskedinput.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $.widget.bridge("uibutton", $.ui.button)
        </script>';
    }



    public function carrega_db()
    {
        require_once(RAIZ . 'src/db/classe_db.php');
        $db = new Database();
        $db->connect();
    }


    public static function carrega_menu()
    {
        require_once(ADMIN . 'menu.php');
    }

    public static function carrega_cabecalho_site()
    {
        require_once('header.php');
    }

    public static function carrega_rodape_site()
    {
        require_once('footer.php');
    }

    public static function carrega_funcoes()
    {
        require_once(RAIZ . 'src/helper/funcoes.php');
        $func = new Funcoes();
    }

    public static function verifica_sessao()
    {
        if (empty($_SESSION)) {
            $errobase64 = base64_encode('1');
            header('Location: ' . URL . 'login.php?e=' . $errobase64);
            exit;
        }
    }
}
