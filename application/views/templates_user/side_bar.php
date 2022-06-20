 <div class="page-wrapper">
     <div class="page-wrapper-inner">

         <!-- Left Sidenav -->
         <div class="left-sidenav">
             <ul class="metismenu left-sidenav-menu" id="side-nav">
                 <li class="menu-title">Main</li>
                 <li class="<?php if ($this->uri->segment(1) == 'Landing') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('Landing'); ?>"><i class="mdi mdi-desktop-mac-dashboard"></i><span class="">Beranda</span></a>
                 </li>

                 <li class="<?php if ($this->uri->segment(1) == 'Konsultasi') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('Konsultasi'); ?>"><i class="mdi mdi-book-open-page-variant"></i><span class="">Konsultasi</span></a>
                 </li>

                 <li>
                     <a href="<?= base_url('Login'); ?>"><i class="mdi mdi-account"></i><span>Login</span></a>
                 </li>
             </ul>
         </div>
         <!-- end left-sidenav-->