<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Emprestimos</title>
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

                <form action="{{ route('all.author') }}" method="GET">
                    @csrf
                    <div class="form-floating">
                        <div class="col-md-12 mb-1">
                            <div class="input-group">
                                <input type="text" class="form-control" name="course"
                                    id="validationDefaultUsername" placeholder="Ex: Luis"  aria-describedby="inputGroupPrepend2" >
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
<h5>Detalhes sobre os emprestimos</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nome do Estudante</th>
                    <th scope="col">Nome do bibliotecario</th>
                    <th scope="col">Livro</th>
                    <th scope="col">Data de emprestimo</th>
                    <th scope="col">Data de devolução</th>
                    <th scope="col">Obs</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($reader as $reader)
                  <tr>

                    <td>{{$reader->name}}</td>
                    <td>Job Mateus</td>
                    <td>Algoritmos</td>
                    <td>29/05/2024</td>
                    <td>20/06/2024</td>
<td> </td>

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
