 <div class="page-wrapper">
     <div class="page-wrapper-inner">

         <!-- Left Sidenav -->
         <div class="left-sidenav">
             <ul class="metismenu left-sidenav-menu" id="side-nav">
                 <li class="menu-title">Main</li>
                 <li class="<?php if ($this->uri->segment(3) == 'Beranda') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Beranda'); ?>"><i class="mdi mdi-desktop-mac-dashboard"></i><span class="">Beranda</span></a>
                 </li>

                 <li class="<?php if ($this->uri->segment(3) == 'Penyakit') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Penyakit'); ?>"><i class="mdi mdi-book-open-page-variant"></i><span class="">Daftar Penyakit</span></a>
                 </li>

                 <li class="<?php if ($this->uri->segment(3) == 'Gejala') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Gejala'); ?>"><i class="mdi mdi-format-list-checkbox"></i><span>Daftar Gejala</span></a>
                 </li>
                 <li class="<?php if ($this->uri->segment(3) == 'BasisPengetahuan') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/BasisPengetahuan'); ?>"><i class="mdi mdi-information"></i><span>Basis Pengetahuan</span></a>
                 </li>
                 <li class="<?php if ($this->uri->segment(3) == 'Aturan') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Aturan'); ?>"><i class="mdi mdi-library-books"></i><span>Aturan</span></a>
                 </li>
                 <li class="<?php if ($this->uri->segment(3) == 'Laporan') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Laporan'); ?>"><i class="mdi mdi-book"></i><span>Laporan Konsultasi</span></a>
                 </li>
             </ul>
         </div>
         <!-- end left-sidenav-->