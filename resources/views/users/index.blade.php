<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hola</title>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table-responsive table-striped table-condensed table-bordered" width="100%" border="1">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nombre</td>
              <td>Tipo Doc</td>
              <td>Estado Civil</td>
              <td>Genero</td>
            </tr>
          </thead>
          @foreach ($users as $user)
            <tbody>
              <tr>
                <td>{{ $user->identification }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->tp_doc->name }}</td>
                <td>{{ $user->marital_status->name }}</td>
                <td>{{ $user->gender->name }}</td>
              </tr>
            </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>

</body>
</html>
