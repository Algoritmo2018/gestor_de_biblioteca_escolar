<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Cadastrar Livro</title>
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
               <!--Message success-->
  @include('partials/message')
  <!--fim message success-->

  <!-- Formulario de cadastro-->
  <div class="container d-flex justify-content-center mt-3 mb-2">

    <form action="{{route('store.book')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <h4>Cadastrar livro</h4>
      <hr class="mb-3">
      <div class="form-floating">

        <div class="col-md-12 mb-3">
          <label for="validationDefaultUsername">Titulo</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend2">T</span>
            </div>
            <input type="text" class="form-control" name="title" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
          </div>
        </div>
      <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Autor:</label>
              </div>
              <select class="form-select  col-md-12 rounded-2" name="author" id="inputGroupSelect01">
                <option selected>Escolher...</option>
                @foreach ($author as $author)
                <option value="{{$author->id}}">{{$author->author}}</option>
                @endforeach
              </select>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
              </div>
              <select class="form-select  col-md-12 rounded-2" name="category" id="inputGroupSelect01">
                <option selected>Escolher...</option>
                @foreach ($category as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
                             </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Editora:</label>
                </div>
                <select class="form-select  col-md-12 rounded-2" name="publishing_company" id="inputGroupSelect01">
                  <option selected>Escolher...</option>
                  @foreach ($publishing_company as $publishing_company)
                  <option value="{{$publishing_company->id}}">{{$publishing_company->publishing_company}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Ano de publicação</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">A</span>
                  </div>
                  <input type="number" class="form-control" name="year_of_publication" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
                </div>
              </div> <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Nº Copias/Examples</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">C/E</span>
                  </div>
                  <input type="number" class="form-control" name="number_of_copies" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
                </div>
              </div>
      <div class="col-md-12 mb-3">
        <label for="validationDefaultUsername">Capa</label>
        <div class="input-group">
          <input type="file" class="form-control" name="image_path" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
        </div>
      </div>
          </div>


          <button class="btn btn-danger" type="button">Cancelar</button>
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form></div>


    <!--fim Formulario de cadastro-->
    </main>

            </a>
        </div>
    </div>
</body>

</html>
