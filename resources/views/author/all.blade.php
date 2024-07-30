<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>autores</title>
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



          <main class="content px-3 py-2">
            <div class="container d-flex  justify-content-center mt-3 mb-2">

                <form action="{{ route('search.author') }}" method="GET">
                    @csrf
                    <div class="form-floating">
                        <div class="col-md-12 mb-1">
                            <div class="input-group">
                                <input type="text" class="form-control" name="author"
                                    id="validationDefaultUsername" placeholder="Ex: Donald"  aria-describedby="inputGroupPrepend2" >
                    <button class="btn btn-primary" type="submit">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

             <!--Message success-->
             @include('partials/message')
             <!--fim message success-->

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Autores</th>

                    <th scope="col"> </th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($author as $author)
                  <tr>

                    <td>{{$author->author}}</td>
                    <td><a href="{{route('edit.author', $author->id)}}" class="text-primary">Editar</a></td>
                    <td>
                        <a  class="text-danger" data-link-id="{{$author->id}}" data-bs-toggle="modal" data-bs-target="#delete-{{$author->id}}">Eliminar</a>
                        @component('components.modal_delete')
                        @slot('id')
                            {{ $author->id }}
                        @endslot
                        @slot('route')
                            {{ route('destroy.author', $author->id) }}
                        @endslot
                        @slot('elements')

                                                @endslot
                    @endcomponent</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </main>

          </a>
        </div>
      </div>
</body>

</html>
