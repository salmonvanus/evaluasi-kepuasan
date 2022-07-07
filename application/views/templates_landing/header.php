<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index | Sistem Pakar Penyakit Sinusitis</title>


    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets_user/'); ?>css/main.css" />

    <script src="<?= base_url('assets_user/'); ?>js/uikit.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

</head>


<body>
    <header id="header" class="uk-background-primary uk-background-norepeat uk-background-cover 
	uk-background-center-center uk-background-fixed uk-background-blend-overlay" style="background-image: url('assets/images/beranda/sinusitis.jpeg');">
        <div class="uk-navbar-wrapper" data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; 
	  cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent ; top: #header; media: @m">
            <nav class="uk-navbar-container">
                <div class="uk-container uk-navbar-transparent uk-light">
                    <div data-uk-navbar>
                        <div class="uk-navbar-left uk-margin-small-left">
                            <a class="uk-navbar-item uk-logo uk-visible@m" href="<?= base_url('Landing'); ?>">Pakar SINUS</a>
                        </div>
                        <div class="uk-navbar-left uk-hidden@m">
                            <a class="uk-navbar-item uk-small-logo" href="<?= base_url('Landing'); ?>">Pakar SINUS</a>
                        </div>
                        <div class="uk-navbar-right">
                            <div>
                                <div data-uk-drop="mode: click; pos: left-center; offset: 0">
                                    <form class="uk-search uk-search-navbar uk-width-1-1" method="POST" onsubmit="return false;">
                                        <input id="search-navbar" class="uk-search-input" type="search" placeholder="Cari disini" autofocus autocomplete="off" data-minchars="1" data-maxitems="30">
                                    </form>
                                </div>
                            </div>
                            <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span></a>
                            <ul class="uk-navbar-nav uk-visible@m">
                                <li class="uk-active"><a href="<?= base_url('Landing'); ?>">Beranda</a></li>
                                <li class="uk-active"><a href="<?= base_url('Konsultasi'); ?>">Konsultasi</a></li>
                                <li>
                                    <div class="uk-navbar-item">
                                        <a class="uk-button uk-button-small uk-button-primary-outline" href="<?= base_url('Login'); ?>">Login</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div>
            <div class="uk-section uk-section-large uk-section-hero uk-position uk-light" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium">
                <div class="uk-container uk-margin-large-top uk-margin-small-bottom">
                    <div class="uk-child uk-grid-large" data-uk-grid>
                        <div class="uk-flex uk-flex-bottom">
                            <center>
                                <h1 class="uk-heading-medium">Selamat Datang di Sistem Pakar Penyakit Sinusitis</h1>
                                <?php for ($i = 0; $i < 3; $i++) {
                                    echo "<br/>";
                                } ?>
                                <a class="uk-button uk-button-large uk-button-primary-outline" href="<?= base_url('Konsultasi'); ?>">Mulai Konsultasi</a>
                                <?php for ($i = 0; $i < 8; $i++) {
                                    echo "<br/>";
                                } ?>
                            </center>
                        </div>
                        <div class="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>