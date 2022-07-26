<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMails extends Mailable {
  use Queueable, SerializesModels;

  public function __construct($data) {
    $this->data = $data;
  }

  public function build() {
    return $this->to($this->data['email'])
      ->subject('登録完了のお知らせ')
      ->view('site.contactMails.success')
      ->with([
        'name' => $this->data['name'],
        'tel' => $this->data['tel'],
        'gender' => $this->data['gender'],
        'contents' => $this->data['contents'],
      ]);
  }
}