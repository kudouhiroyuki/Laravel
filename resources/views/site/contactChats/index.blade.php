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
    <div class="row">
      <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
          <textarea name="message" style="max-width: 400px; margin: 0 auto" class="form-control"></textarea>
          <div class="text-center">
            <button type="submit" class="js-chat-submit btn btn-primary">投稿</button>
          </div>
        </div>
        <div class="line-bc">
          @foreach($contact_chats as $value)
            @if ($value->id === 1)
              <div>
                <div style="font-size: 12px; color: #fff">name</div>
                <div class="clearfix">
                  <div class="balloon1 float-left">{{ $value->message }}</div>
                </div>
                <div className="clearfix">
                  <time style="font-size: 12px">{{ $value->created_at }}</time>
                </div>
              </div>
            @else
              <div>
                <div class="clearfix">
                  <div class="float-right">
                    <div style="font-size: 12px; color: #fff">{{ $value->name }}</div>
                  </div>
                </div>
                <div class="clearfix">
                  <div class="balloon2 float-right">{{ $value->message }}</div>
                </div>
                <div class="clearfix">
                  <div class="float-right">
                    <time style="font-size: 12px">{{ $value->created_at }}</time>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </article>
    </div>
  @endguest
@endsection

<script src="{{ mix('js/contactChats.js') }}"></script>




