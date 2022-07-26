<!doctype html>
<html>
<head>
  <title>TEST</title>
</head>
<body>
  <?php $title = 'MstEmployees(編集 : edit update)'; ?>  
  <h1>{{ $title }}</h1>

  <form method="POST" action="{{ route('mstEmployees.update',[$employees->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" placeholder="id" name="id" value="{{ $employees->id }}">
    <select name="department_id" value="{{ $employees->department_id }}">
      @foreach($departments as $value)
        @if ($employees->department_id == $value->department_id)
          <option value="{{ $value->department_id }}" selected="selected">{{ $value->department_id }}</option>
        @else
          <option value="{{ $value->department_id }}">{{ $value->department_id }}</option>
        @endif
      @endforeach
    </select>
    <input type="text" placeholder="last_name" name="last_name" value="{{ $employees->last_name }}">
    <input type="text" placeholder="first_name" name="first_name" value="{{ $employees->first_name }}">
    <input type="text" placeholder="old" name="old" value="{{ $employees->old }}">
    <img src="{{ Storage::url($employees->img_path) }}">
    <input type="file" name="img_path">
    <button type="submit">編集</button>
  </form>

  <a href="{{ route('mstEmployees.index') }}">一覧</a>

<script>
</script>
</body>
</html>