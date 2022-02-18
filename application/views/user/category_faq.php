<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index | Aplikasi Konsultasi Hukum Kabupaten Minahasa Selatan</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets_user/images/'); ?>logo_minsel.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets_user/'); ?>css/main.css" />
    <script src="<?= base_url('assets_user/'); ?>js/uikit.js"></script>
</head>

<body>

    <div class="uk-navbar-wrapper" data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; 
  cls-active: uk-navbar-sticky; top: 400; media: @m">
        <nav class="uk-navbar-container">
            <div class="uk-container uk-navbar-transparent uk-light">
                <div data-uk-navbar>
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo uk-visible@m" href="<?= base_url('Landing'); ?>">Konsultasi Hukum</a>
                    </div>
                    <div class="uk-navbar-center uk-hidden@m">
                        <a class="uk-navbar-item uk-logo" href="<?= base_url('Landing'); ?>">Konsultasi Hukum</a>
                    </div>
                    <div class="uk-navbar-right">
                        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span></a>
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="<?= base_url('Landing'); ?>">Beranda</a></li>
                            <li><a href="<?= base_url('Faq') ?>">Faq</a></li>
                            <li class=""><a href="<?= base_url('Article'); ?>">Artikel</a></li>
                            <li>
                                <div class="uk-navbar-item">
                                    <a class="uk-button uk-button-small uk-button-primary-outline" href="<?= base_url('Consultation_form'); ?>">Konsultasi</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>


    <div class="uk-section uk-section-large uk-section-default">
        <div class="uk-container">
            <div data-uk-grid>
                <div class="uk-width-1-3@m">
                    <h2 class="uk-h1"><a href="#"><?php echo $category_name['category_name']; ?>
                        </a></h2>
                    <!-- <p class="uk-text-lead">Your payments methods and price offerings questions answered</p> -->
                </div>
                <div class="uk-width-expand@m">
                    <ul class="uk-breadcrumb uk-margin-bottom uk-text-500">
                        <li><a href="<?= base_url('Landing'); ?>"><?php $segment_1 = $this->uri->segment(1);
                                                                    echo ucwords($string = str_replace("$segment_1", 'Beranda', $segment_1)); ?></a></li>
                        <li><span style="color: red;"><?php $segment_2 = $this->uri->segment(2);
                                                        echo ucwords($string = str_replace("$segment_2", "Detail $category_name[category_name]", $segment_2)); ?></span></li>
                    </ul>
                    <div class="uk-child-width-1-2@s uk-h4 uk-text-500" data-uk-grid>
                        <?php foreach ($consultation_category as $data) : ?>
                            <div><a href="<?php
                                            $id = $data['faq_id'];
                                            $encrypt = (($id * 123678 * 312) / 7536);
                                            $link = urlencode(base64_encode($encrypt));
                                            echo base_url('Faq/detail_faq/') . $link; ?>">
                                    <?php echo '<u style="color:black;">' . $data['category_name'] . '</u>';
                                    echo " - ";
                                    echo $data['faq_consultation']; ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>