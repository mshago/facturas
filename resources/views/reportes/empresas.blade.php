<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Styles -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>RFC</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $company)
                    <tr>
                        <td class="text-center">{{$company->id}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->address}}</td>
                        <td>{{$company->rfc}}</td>
                        <td>{{$company->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
