<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>チャット</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
  <style>
  body {
    margin: 0;
  }
  .chatPage {
    overflow: hidden;
    background: #f7f7f7;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }
  main {
    flex: 1;
  }
  section {
    width: 80%;
    margin: 0 auto;
  }
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
</head>
 
<body>
  <div class="chatPage">
    <header>
      <div class="row">
        <div class="col-12 clearfix">
          <div class="float-left">
            <h1 style="font-size: 20px">チャット</h1>
          </div>
        </div>
      </div>
      <hr />
    </header>
    <main>
      <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <section>
            <form method="POST" action="{{ route('chat.store') }}">
              @csrf
              <div class="form-group text-center">
                <input type="text" name="name" />
              </div>
              <div class="form-group">
                <textarea name="message" style="max-width: 400px; margin: 0 auto" class="form-control"></textarea>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">投稿</button>
                </div>
              </div>
            </form>

            <p>全件</p>
            <div class="line-bc">
              @foreach($chat as $value)
                @if ($value->name === '工藤')
                  <div>
                    <div style="font-size: 12px; color: #fff">{{ $value->name }}</div>
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
          </section>
        </article>
      </div>
    </main>
  </div>
</body>