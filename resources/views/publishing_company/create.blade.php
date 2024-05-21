<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Editando Editora</title>
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

    <form action="{{route('store.publishing_company')}}" method="POST">
        @csrf()
    <h4>Cadastrar Editora</h4>
    <hr class="mb-3">
    <div class="form-floating">

      <div class="col-md-12 mb-3">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">C</span>
          </div>
          <input type="text" class="form-control" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" name="publishing_company" value="{{old('publishing_company')}}" required>
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
