<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return $this->adminHomePage();
    }

    public function update(Request $req, $id)
    {
        return $this->adminUpdateMethod($req, $id);
    }
}
