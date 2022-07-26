@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <p>{{ $blog_posts->category }}</p>
      <h3 class="mb-4">{{ $blog_posts->title }}</h3>
      <p>{{ $blog_posts->updated_at->format('Y-m-d') }}</p>
      <img class="w-50 d-block mr-auto mb-4" src="{{ Storage::url($blog_posts->main_image) }}">
      <p class="lh-lg">{!! $blog_posts->body !!}</p>
    </div>
  </div>
@endsection

