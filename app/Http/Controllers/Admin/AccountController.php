<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller {

    public function users() {
        $users = User::paginate(15);
        return view('admin.user.index')->with([
            'users' =>$users
        ]);
    }

    public function detail($id) {

        return view('admin.user.detail');
    }
}