<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Chat;

class ChatController extends Controller {
  public function index() {
    $chat = Chat::get();
    return view('chat.index', [
      'chat' => $chat,
    ]);
  }
  public function store(Request $request) {
    logger($request);
    Chat::create([
      'name' => $request->input('name'),
      'message' => $request->input('message'),
    ]);
    return redirect('chat');
  }
}