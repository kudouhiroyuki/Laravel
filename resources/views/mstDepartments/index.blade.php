<!doctype html>
<html>
<head>
  <title>TEST</title>
</head>
<body>
  <?php
    $title = 'mstDepartments(一覧 : index)';
  ?>

  <h1>{{ $title }}</h1>

  <table>
    <thead>
      <tr>
        <th scope="col">社員番号</th>
        <th scope="col">職種</th>
      </tr>
    </thead>
    <tbody>
      @foreach($departments as $value)
        <tr>
          <td>{{ $value->department_id }}</td>
          <td>{{ $value->department_name }}</td
        </tr>
      @endforeach
    </tbody>
  </table>
<script>
</script>
</body>
</html>