<!doctype html>
<html>
<head>
  <title>TEST</title>
</head>
<body>
  <?php
    $title = 'MstEmployees(新規登録 : create store)';
  ?>  
  <h1>{{ $title }}</h1>

  @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
  @endforeach

  <form method="POST" action="{{ route('mstEmployees.store') }}" enctype="multipart/form-data">
    @csrf
    <select name="department_id">
      @foreach($departments as $item)
        <option value="{{ $item->department_id }}">{{ $item->department_id }}</option>
      @endforeach
    </select>
    <input type="file" name="img_path">
    <input type="search" placeholder="last_name" name="last_name" value="">
    <input type="text" placeholder="first_name" name="first_name" value="">
    <input type="text" placeholder="old" name="old" value="">
    <button type="submit">新規登録</button>
  </form>
  
  <a href="{{ route('mstEmployees.index') }}">一覧</a>

<script>
</script>
</body>
</html>