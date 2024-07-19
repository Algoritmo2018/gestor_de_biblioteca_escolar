<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Livros devolvidos</title>
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

                <form action="{{ route('all.student') }}" method="GET">
                    @csrf
                    <div class="form-floating">
                        <div class="col-md-12 mb-1">
                            <div class="input-group">
                                <input type="text" class="form-control" name="course"
                                    id="validationDefaultUsername" placeholder="Ex: arte"  aria-describedby="inputGroupPrepend2" >
                    <button class="btn btn-primary" type="submit">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
             <!--Message success-->
             @include('partials/message')
             <!--fim message success-->
            <div class="card-body">
<h4>Registros de livros devolvidos</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nome do livro</th>
                    <th scope="col">Nome do estudante</th>
                    <th scope="col">Nome do bibliotecario</th>
                    <th scope="col">Data de devolução</th>
                    <th scope="col">Obs</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($book_return as $book_return)
                  <tr>

                    <td>{{$book_return->book->title}}</td>
                    <td>{{$book_return->student->name}}</td>
                     <td>{{$book_return->user->name}}</td>
                    <td>{{$book_return->return_date}}</td>
                    <td>{{$book_return->observation}}</td>
                  

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </main>

          </a>
        </div>
      </div></body>

</html>
