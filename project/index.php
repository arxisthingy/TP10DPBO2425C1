<?php
// require all viewmodels
require_once 'viewmodels/DepoViewModel.php';
require_once 'viewmodels/LokomotifViewModel.php';
require_once 'viewmodels/GerbongViewModel.php';
require_once 'viewmodels/RangkaianViewModel.php';
require_once 'viewmodels/DetailRangkaianViewModel.php';

// header
include 'views/template/header.php';

// routing
$page = $_GET['page'] ?? 'home';
$id = $_GET['id'] ?? null;

// route handling
switch($page) {
    // home and rangkaian management
    case 'home':
        $vm = new RangkaianViewModel(); $list = $vm->index(); include 'views/rangkaian_list.php'; break;

    // rangkaian form, save, delete
    case 'rangkaian_add':
        $vm = new RangkaianViewModel(); $data = $vm->form(); include 'views/rangkaian_form.php'; break;
    case 'rangkaian_save': (new RangkaianViewModel())->save(); break;
    case 'rangkaian_delete': (new RangkaianViewModel())->delete($id); break;

    // detail rangkaian management
    case 'detail_rangkaian':
        $vm = new DetailRangkaianViewModel(); $data = $vm->index($id); include 'views/detailrangkaian_list.php'; break;
    case 'detail_add': (new DetailRangkaianViewModel())->add(); break;
    case 'detail_delete': (new DetailRangkaianViewModel())->delete($id, $_GET['parent']); break;

    // depo management
    case 'depo': $list = (new DepoViewModel())->index(); include 'views/depo_list.php'; break;
    case 'depo_form': $data = (new DepoViewModel())->form($id); include 'views/depo_form.php'; break;
    case 'depo_save': (new DepoViewModel())->save(); break;
    case 'depo_delete': (new DepoViewModel())->delete($id); break;

    // lokomotif management
    case 'loko': $list = (new LokomotifViewModel())->index(); include 'views/lokomotif_list.php'; break;
    case 'loko_form': $data = (new LokomotifViewModel())->form($id); include 'views/lokomotif_form.php'; break;
    case 'loko_save': (new LokomotifViewModel())->save(); break;
    case 'loko_delete': (new LokomotifViewModel())->delete($id); break;

    // gerbong management
    case 'gerbong': $list = (new GerbongViewModel())->index(); include 'views/gerbong_list.php'; break;
    case 'gerbong_form': $data = (new GerbongViewModel())->form($id); include 'views/gerbong_form.php'; break;
    case 'gerbong_save': (new GerbongViewModel())->save(); break;
    case 'gerbong_delete': (new GerbongViewModel())->delete($id); break;

    // default route
    default: echo "<h1>Halaman Tidak Ditemukan</h1>";
}

// footer
include 'views/template/footer.php';
?>