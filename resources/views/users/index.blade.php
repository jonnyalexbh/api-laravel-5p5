<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hola</title>
</head>
<body>

  <table border="1">
    <tr>
      <td>Id</td>
      <td>Nombre</td>
      <td>Genero</td>
    </tr>

    @foreach ($users as $user)
      <tr>
        <td>{{ $user->identification }}</td>
        <td>{{ $user->first_name }}</td>
        <td>{{ $user->gender->name }}</td>
      </tr>
    @endforeach

  </table>

</body>
</html>
