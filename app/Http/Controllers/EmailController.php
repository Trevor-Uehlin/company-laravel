<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;

class EmailController extends Controller {

    public function index() {

        return view('email.create');
    }


    public function create() {}


    public function store(Request $request) {

        Mail::to(env('APP_EMAIL_ADDRESS'))->send(new ContactMe($request));

        return redirect('email/success');
    }

    public function show($id) {}


    public function edit($id) {}


    public function update(Request $request, $id) {}


    public function destroy($id) {}
}
