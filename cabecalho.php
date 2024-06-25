<?php require_once("sistema/conexao.php");
$css_file = "css/style.css";
$css_version = filemtime($css_file);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="barbearia freitas, salão de beleza" />
    <meta name="description" content="Fazemos todo tipo de serviço ..." />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="images/<?php echo $icone_site ?>" type="image/x-icon">

    <!-- Manifesto PWA -->
    <link rel="manifest" href="manifest.json">

    <!-- Compatibilidade PWA -->
    <script src="pwacompat.js"></script>

    <!-- Configurações para iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="images/icons/icon-192x192.png">
    <link rel="apple-touch-icon" sizes="512x512" href="images/icons/icon-512x512.png">

    <!-- Ícones adicionais para iOS -->
    <link rel="apple-touch-icon" sizes="48x48" href="images/icons/icon-48x48.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="96x96" href="images/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="128x128" href="images/icons/icon-128x128.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/icons/icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="384x384" href="images/icons/icon-384x384.png">

    <title><?php echo $nome_sistema ?></title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo $css_file ?>?v=<?php echo $css_version ?>">
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="overlay"></div>
        <div class="hero_bg_box">
            <img src="images/<?php echo $img_banner_index ?>" alt="">
        </div>
        <!-- header section strats -->
        <header id="main-header" class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <img src="sistema/img/logo.png" width="80px" style="filter: invert(100%); margin-right: 3px">
                    <!-- <a class="navbar-brand " href="index"> <?php echo $nome_sistema ?> </a> -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="agendamentos"> Agendamentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="produtos">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="servicos">Serviços</a>
                            </li>


                            <li class="nav-item">
                                <a title="Ir para o Sistema" class="nav-link" href="sistema" target="_blank"> <i
                                        class="fa fa-user icon" aria-hidden="true"></i> </a>
                            </li>

                            <li class="nav-item">
                                <a title="Ir para o Whatsapp" class="nav-link"
                                    href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $tel_whatsapp ?>"
                                    target="_blank"> <i class="fa fa-whatsapp icon" aria-hidden="true"></i> </a>
                            </li>

                            <li class="nav-item">
                                <a title="Ver Instagram" class="nav-link" href="<?php echo $instagram_sistema ?>"
                                    target="_blank"> <i class="fa fa-instagram icon" aria-hidden="true"></i> </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->