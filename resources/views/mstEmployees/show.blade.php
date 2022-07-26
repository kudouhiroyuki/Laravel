<!doctype html>
<html>
<head>
  <title>TEST</title>
</head>
<body>
  <?php $title = 'MstEmployees(詳細 : show)'; ?>  
  <h1>{{ $title }}</h1>

  <table>
    <thead>
      <tr>
        <th scope="col">社員番号</th>
        <th scope="col">職種番号</th>
        <th scope="col">職種</th>
        <th scope="col">名前</ßth>
        <th scope="col">年齢</th>
        <th scope="col">画像</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $mstEmployees->id }}</td>
        <td>{{ $mstEmployees->department_id }}</td>
        <td>{{ $mstEmployees->department_name }}</td>
        <td>{{ $mstEmployees->last_name.$mstEmployees->first_name }}</td>
        <td>{{ $mstEmployees->old }}</td>
        <td><img src="{{ Storage::url($mstEmployees->img_path) }}"></td>
      </tr>
    </tbody>
  </table>

  <a href="{{ route('mstEmployees.index') }}">一覧</a>

<script>
</script>
</body>
</html>