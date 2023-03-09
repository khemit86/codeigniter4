<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Desktop extends BaseController {
    public function index() {
        return view('admin/desktop_view');
    }
}
?>