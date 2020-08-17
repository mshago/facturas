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
                    <th>Razón social</th>
                    <th>RFC receptor</th>
                    <th>Folio</th>
                    <th>Sociedad emisora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $bill)
                    <tr>
                        <td>{{$bill->id}}</td>
                        <td>{{$bill->social_reason}}</td>
                        <td>{{$bill->rfc}}</td>
                        <td>{{$bill->folio}}</td>
                        <td>{{$bill->company}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
