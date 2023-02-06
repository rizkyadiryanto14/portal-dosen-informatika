<?php
defined('BASEPATH') or exit('No direct script access allowed');

//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//route login

$route['login']  = 'auth';
$route['logout'] = 'auth/logout';

//end route login

// route admin
$route['admin/dashboard'] = 'Admin/Dashboard';
$route['dosen']         = 'Admin/Dosen';
$route['dosen/list']    = 'Admin/Dosen';
$route['tambahDosen']   = 'Admin/Dosen/tambahdata';
//bkd
$route['admin/bkd'] = 'Admin/Bkd';
$route['tambahData'] = 'Admin/Bkd/tambah';
$route['editData']   = 'Admin/Bkd/edit_data';
$route['hapusData']  = 'Admin/Bkd/hapus_data';
//end bkd

$route['dosen/dashboard'] = 'Dosen/Dashboard';
