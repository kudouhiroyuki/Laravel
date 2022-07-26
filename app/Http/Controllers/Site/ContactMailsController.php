<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMailsValidation;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactMails;
use App\Models\ContactMails;

class ContactMailsController extends Controller {
  public function index() {
    return view('site.contactMails.index');
  }
  public function store(ContactMailsValidation $request) {
    $result = ContactMails::create([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'tel' => $request->input('tel'),
      'gender' => $request->input('gender'),
      'contents' => $request->input('contents'),
    ]);
    Mail::send(new SendContactMails([
      'name' => $result['name'],
      'email' => $result['email'],
      'tel' => $result['tel'],
      'gender' => $result['gender'],
      'contents' => $result['contents'],
    ]));
    return view('site.contactMails.complete');
  }
}
