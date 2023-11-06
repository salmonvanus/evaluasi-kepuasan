<?php
defined('BASEPATH') or exit('No direct script access allowed');

// user-menu
$route['beranda']                   = 'c_landing';
$route['kuesioner']                 = 'c_kuesioner';
$route['kuesioner/view']['POST']    = 'c_kuesioner/view';
$route['kuesioner/input-kuesioner'] = 'c_kuesioner/inputKuesioner';

// auth
$route['login']                     = 'auth/c_login';
$route['logout']                    = 'auth/c_login/logout';
$route['cek_login']                 = 'auth/c_login/cek_login';

// admin home
$route['admin/beranda']             = 'admin/c_beranda';

// admin profil
$route['admin/profil']              = 'auth/c_profil';
$route['admin/profil/get/(:num)']   = 'auth/c_profil/get/$1';
$route['admin/profil/edit_profil']  = 'auth/c_profil/edit_profil';
$route['admin/profil/changepassword'] = 'auth/c_profil/changepassword';

// admin pengguna
$route['admin/pengguna']             = 'auth/c_pengguna';

// admin kuesioner
$route['admin/pertanyaan']           = 'admin/c_pertanyaan';
$route['admin/pertanyaan/create']    = 'admin/c_pertanyaan/create';
$route['admin/pertanyaan/get/(:num)']= 'admin/c_pertanyaan/get/$1';
$route['admin/pertanyaan/edit']      = 'admin/c_pertanyaan/edit';

// admin responden                  
$route['admin/responden']               = 'admin/c_responden';
$route['admin/filter-data']['POST']     = 'admin/c_responden/fetchData';
$route['admin/lihat-responden-pengguna/(:any)'] = 'admin/c_responden/lihatRespondenPengguna/$1';

// admin periode                
$route['admin/periode-kuesioner']   = 'admin/c_periode_kuesioner';

// admin analisis
$route['admin/analisis']            = 'admin/c_analisis';

$route['default_controller']        = 'c_landing';
$route['404_override']              = '';
$route['translate_uri_dashes']      = FALSE;
