<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Laravel</title>
    </head>

    <body>
        <div class="container">
          <div class="row">
            <div class="col-sm-8 mx-auto">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          <form action="{{ route('users.destroy', $user) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input 
                              type="submit" 
                              value="Eliminar" 
                              class="btn btn-sm btn-danger"
                              onclick="return confirm('¿Desea eliminar...?')">
                          </form>
                        </td>
                      </tr>
                      @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                      @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </body>
</html>
