<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// ** I can write all the code here and i know, but i just want to show you that i know little bit oops concept like abstract..., **//
class PhoneConnController extends Controller
{

    public function index()
    {
        return $this->phoneHomePage();
    }

    public function create()
    {
        return $this->phoneCreatePage();
    }

    public function edit($id)
    {
        return $this->phoneEditPage($id);
    }

    public function store(Request $req)
    {
        return $this->phoneStoreMethod($req);
    }

    public function update(Request $req, $id)
    {
        return $this->phoneUpdateMethod($req, $id);
    }

    public function destroy($id)
    {
        return $this->phoneDestroyMethod($id);
    }
}
