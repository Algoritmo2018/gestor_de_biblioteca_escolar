<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Cadastrar Leitor</title>
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

    <form action="{{route('store.reader')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <h4>Cadastrar Leitor</h4>
      <hr class="mb-3">
      <div class="form-floating">

        <div class="col-md-12 mb-3">
          <label for="validationDefaultUsername">Nome</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend2">N</span>
            </div>
            <input type="text" class="form-control" name="name" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
          </div>
        </div>

        <div class="col-md-12 mb-3">
            <label for="validationDefaultUsername">Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
              </div>
              <input type="text" class="form-control" name="email" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
            </div>
          </div>
          <div class="col-md-12 mb-3">
            <label for="validationDefaultUsername">Contacto</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">C</span>
              </div>
              <input type="text" class="form-control" name="contact" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
            </div>
          </div>
          <div class="col-md-12 mb-3">
            <label for="validationDefaultUsername">Residência</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">R</span>
              </div>
              <input type="text" class="form-control" name="residence" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
            </div>
          </div>

          </div>


        <button class="btn btn-primary" type="submit">Guardar</button>
    </form></div>


    <!--fim Formulario de cadastro-->
    </main>

            </a>
        </div>
    </div>
</body>

</html>
