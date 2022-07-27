@extends('layouts.app')
<style>
  .line-bc {
    padding: 20px 10px;
    max-width: 868px;
    margin: 15px auto;
    font-size: 14px;
    background: #88b3f7;
  }
  .balloon1 {
    position: relative;
    padding: 10px;
    border-radius: 10px;
    background-color: #000;
    color: #fff;
    max-width: 250px;
    font-size: 15px;
    word-wrap: break-word;
    margin-left: 10px;
  }
  .balloon1::before {
    content: '';
    display: inline-block;
    position: absolute;
    top: 3px;
    left: -19px;
    border: 8px solid transparent;
    border-right: 18px solid #000;
    -webkit-transform: rotate(35deg);
    transform: rotate(35deg);
  }
  .balloon2 {
    position: relative;
    padding: 10px;
    border-radius: 10px;
    background-color: #30e852;
    max-width: 250px;
    font-size: 15px;
    word-wrap: break-word;
    margin-right: 20px;
  }
  .balloon2::before {
    content: '';
    position: absolute;
    top: 3px;
    right: -19px;
    border: 8px solid transparent;
    border-left: 18px solid #30e852;
    -webkit-transform: rotate(-35deg);
    transform: rotate(-35deg);
  }
  </style>

@section('content')
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">お問い合わせ</h1>
    </div>
  </section>
  @guest
    <p class="text-center">ログインが必要です
    </p>
  @else
    <div class="container">
      <div class="row justify-content-center">
        <article class="col-md-8">
          <div class="form-group mb-5">
            <input type="hidden" name="username" value="{{ Auth::user()['username'] }}" class="js-chat-username">
            <input type="hidden" name="name" value="{{ Auth::user()['name'] }}" class="js-chat-name">
            <textarea name="message" class="js-chat-message form-control mb-3"></textarea>
            <div class="text-center">
              <button type="submit" class="js-chat-submit btn btn-primary">投稿</button>
            </div>
          </div>
          <div class="js-chat-row line-bc">
            @foreach($contact_chats as $value)
              <div class="mb-3">
                <div style="font-size: 12px; color: #fff">{{ $value->name }}</div>
                <div class="clearfix">
                  <div class="balloon1 float-left">{{ $value->message }}</div>
                </div>
                <div className="clearfix">
                  <time style="font-size: 12px">{{ $value->created_at }}</time>
                </div>
              </div>
            @endforeach
          </div>
        </article>
      </div>
    </div>
  @endguest
@endsection

<script src="{{ mix('js/contactChats.js') }}"></script>




