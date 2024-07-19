<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Bibliotecario</title>
    <!--links-->
@include('partials/links')
<!--fim links-->


    <style>
        a {
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div class="wrapper">

        @include ('partials/aside')


        <div class="main">
            @include('partials/nav')



          <main class="content px-3 py-2 mt-4">

             <!--Message success-->
             @include('partials/message')
             <!--fim message success-->
            <div class="card-body">
<h4>Dados do bibliotecario</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">B.i.</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">residencia</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <td>{{$user->name}}</td>
                    <td>{{$library_information->bi}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$library_information->contact}}</td>
                    <td>{{$library_information->residence}}</td>

                    <td><a href="{{route('edit.library_information', $library_information->id)}}" class="text-primary">Editar</a></td>
                    <td><form action="{{ route('destroy.library_information', $library_information->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a  onclick="event.preventDefault();
                            this.closest('form').submit();" class="text-danger">Deletar</a></form></td>
                  </tr>

                </tbody>
              </table>
            </div>
          </main>

          </a>
        </div>
      </div></body>

</html>
