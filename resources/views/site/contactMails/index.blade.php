@extends('layouts.app')

@section('content')
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">お問い合わせ</h1>
    </div>
  </section>

  <div class="container">
    <div class="col-md-8 offset-md-2">
      @if ($errors->all())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>・{{$error}}</p>
          @endforeach
        </div>
      @endif
      <form method="POST" action="{{ route('contactMails.store') }}">
        @csrf
        <div class="form-group">
          <p class="control-label">
            <b>名前</b>
            <span class="badge badge-danger ml-1">必須</span>
          </p>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <p class="control-label">
            <b>メールアドレス</b>
            <span class="badge badge-danger ml-1">必須</span>
          </p>
          <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
          <p class="control-label">
            <b>電話番号</b>
          </p>
          <input type="text" class="form-control" name="tel">
        </div>
        <div class="form-group">
          <p class="control-label">
            <b>性別</b>
            <span class="badge badge-danger ml-1">必須</span>
          </p>
          <div class="d-inline">
            <input type="radio" value="男" name="gender" id="man">
              <label for="man">男性</label>
          </div>
          <div class="d-inline">
            <input type="radio" value="女" name="gender" id="woman">
            <label for="woman">女性</label>
          </div>
        </div>
        <div class="form-group">
          <p class="control-label">
            <b>メッセージ本文</b>
            <span class="badge badge-danger ml-1">必須</span>
          </p>
          <textarea class="form-control" name="contents" rows="5"></textarea>
        </div>
        <div class="text-center pt-4 col-md-6 offset-md-3">
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
    </div>
  </div>
@endsection
