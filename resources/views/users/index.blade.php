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
              <div class="card border-0 shadow">
                <div class="card-body">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        - {{$error }} <br>
                        @endforeach
                      </div>
                  @endif
                  <form action="{{ route('users.strore') }}" method="POST">
                    <div class="form-row">
                      <div class="col-sm-3">
                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                      </div>
                      <div class="col-sm-3">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                      </div>
                      <div class="col-auto">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card border-0 shadow">
                <div class="card-body">
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
          </div>
        </div>
    </body>
</html>
