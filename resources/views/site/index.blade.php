@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="p-5">

            <div class="row">
              @foreach($blog_posts as $value)
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{ Storage::url($value->main_image) }}">
                    <div class="card-body">
                      <p>{{ $value->title }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('blogs.show', $value->id) }}">詳細</a>
                        <small class="text-muted">{{ $value->category_name }}</small>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
