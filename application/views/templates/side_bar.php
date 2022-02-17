 <div class="page-wrapper">
     <div class="page-wrapper-inner">

         <!-- Left Sidenav -->
         <div class="left-sidenav">

             <ul class="metismenu left-sidenav-menu" id="side-nav">

                 <li class="menu-title">Main</li>
                 <li class="<?php if ($this->uri->segment(3) == 'Admin_Panel') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Admin_panel'); ?>"><i class="mdi mdi-monitor"></i><span class="">Dashboards</span></a>
                 </li>

                 <li>
                     <a href="javascript: void(0);"><i class="mdi mdi-clipboard-outline"></i><span>Konsultasi</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                     <ul class="nav-second-level" href="javascript : void(0) " aria-expanded="false">
                         <li class="<?php
                                    if ($this->uri->segment(3) == 'read_consultation') {
                                        echo 'active';
                                    } else {
                                        ' ';
                                    } ?>">
                             <a href="<?= base_url('admin/Admin_consultation'); ?>"><span>Belum direspon</span>
                             </a>
                         </li>
                         <li class="<?php if ($this->uri->segment(3) == 'show_consultation') {
                                        echo 'active';
                                    }
                                    if ($this->uri->segment(4) == 'detail_consultation') {
                                        echo 'active';
                                    } else {
                                        ' ';
                                    } ?>">
                             <a href="<?= base_url('admin/Admin_consultation/show_consultation'); ?>"><span>Sudah direspon</span></a>
                         </li>
                     </ul>
                 </li>
                 <li class="<?php if ($this->uri->segment(3) == 'show_article') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Admin_article/show_article'); ?>"><i class="mdi mdi-book-open-page-variant"></i><span class="">Daftar Artikel</span></a>
                 </li>

                 <li class="<?php if ($this->uri->segment(3) == 'Admin_category') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Admin_category/'); ?>"><i class="fas fa-th-list"></i><span>Daftar Topik</span></a>
                 </li>

                 <li class="<?php if ($this->uri->segment(2) == 'Admin_faq') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Admin_faq/'); ?>"><i class="far fa-question-circle"></i><span>Daftar FAQ</span></a>
                 </li>

                 <li class="<?php if ($this->uri->segment(2) == 'Admin_video') {
                                echo 'active';
                            } ?>">
                     <a href="<?= base_url('admin/Admin_video/'); ?>"><i class="fas fa-video"></i></i><span>Video Kontrol</span></a>
                 </li>
             </ul>
         </div>
         <!-- end left-sidenav-->