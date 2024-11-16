<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PhoneConnection;

abstract class Controller
{

    public function adminHomePage() {
        $phoConnDatas = PhoneConnection::all();
        return view('adminPhoneConnection.index', compact('phoConnDatas'));
    }

    public function adminUpdateMethod($req, $id) {

        $validateStatus = $req->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
        ]);

        $phoneConn = PhoneConnection::find($id);
        $phoneConn->status = $validateStatus['status'];
        // dd($validateStatus);

        if($phoneConn->update($validateStatus)) {
            return redirect()->route('admin')->with('success', 'Status has been Updated Successfully');
        } else {
            return redirect()->route('admin.pho.home')->with('error', 'Failed to Update');
        }

    }

    public function phoneHomePage() {
        $phoConnDatas = PhoneConnection::where('cust_id', Auth()->id())->get();
        return view('phoneConnection.index', compact('phoConnDatas'));
    }

    public function phoneCreatePage() {
        return view('phoneConnection.create');
    }

    public function phoneEditPage($id) {
        $phoneConn = PhoneConnection::find($id);
        return view('phoneConnection.edit', compact('phoneConn'));
    }

    public function phoneStoreMethod($req) {

        // dd($req->all());
        $req->validate([
            'firstname' => ['required', 'string', 'max:40'],
            'lastname' => ['required', 'string', 'max:40'],
            'date_of_birth' => ['required'],
            'email_address' => ['required', 'email', 'lowercase', 'string', 'max:150', 'unique:phone_conns,email_address'],
            'address' => ['required', 'string', 'max:255'],
        ],[
            'date_of_birth.required' => 'Date of birth field is must required',
        ]);

        // $dateAndTime = $req->date_of_birth;
        // $date = Carbon::parse($dateAndTime);
        $onlyDate = Carbon::now()->toDateString();
        $onlyTime = Carbon::now()->toTimeString();
        // $onlyDate = $date->toDateString();
        // $onlyTime = $date->toTimeString();
        // dd($onlyTime);

        $phoneConn = new PhoneConnection();
        $phoneConn->cust_id = Auth()->user()->id;
        $phoneConn->firstname = $req->firstname;
        $phoneConn->lastname = $req->lastname;
        $phoneConn->date_of_birth = $req->date_of_birth;
        $phoneConn->email_address = $req->email_address;
        $phoneConn->address = $req->address;
        $phoneConn->date = $onlyDate;
        $phoneConn->time = $onlyTime;
        if($phoneConn->save()) {
            return redirect()->route('pho.home')->with('success', 'The Application is Submitted Successfully');
        } else {
            return redirect()->route('pho.create')->with('error', 'Failed to Save');
        }

    }

    public function phoneUpdateMethod($req, $id) {
        $req->validate([
            'firstname' => ['required', 'string', 'max:40'],
            'lastname' => ['required', 'string', 'max:40'],
            'date_of_birth' => ['required'],
            'email_address' => ['required', 'email', 'lowercase', 'string', 'max:150'],
            'address' => ['required', 'string', 'max:255'],
        ],[
            'date_of_birth.required' => 'Date of birth field is must required',
        ]);


        $phoneConn = PhoneConnection::find($id);
        if($phoneConn->update($req->all())) {
            return redirect()->route('pho.home')->with('success', 'The Application is Updated Successfully');
        } else {
            return redirect()->route('pho.edit')->with('error', 'Failed to Update');
        }
    }

    public function phoneDestroyMethod($id) {
        $phoneConn = PhoneConnection::find($id);
        if($phoneConn->delete()) {
            return redirect()->route('pho.home')->with('success', 'The Application is Deleted Successfully');
        } else {
            return redirect()->route('pho.home')->with('error', 'Failed to Delete');
        }
    }
}
