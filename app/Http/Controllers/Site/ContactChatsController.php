<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactChats;

use App\Events\MessageCreated;

class ContactChatsController extends Controller {
  public function index() {
    $contact_chats = contactChats::get();
    return view('site.contactChats.index', [
      'contact_chats' => $contact_chats,
    ]);
  }
  public function store(Request $request) {
    $message = contactChats::create([
      'message' => $request->input('message'),
    ]);
    event(new MessageCreated($message));
  }
}
