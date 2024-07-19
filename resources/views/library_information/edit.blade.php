<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Editar meus dados</title>
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

    <form action="{{route('update.library_information', $library_information->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <h4>Editar meus dados</h4>
      <hr class="mb-3">
      <div class="form-floating">



              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Bilhete de identidade</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">B.I.</span>
                  </div>
                  <input type="text" class="form-control" name="bi" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" value="{{$library_information->bi}}" required>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Residência</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">R</span>
                  </div>
                  <input type="text" class="form-control" name="residence" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" value="{{$library_information->residence}}" required>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Contacto</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">C</span>
                  </div>
                  <input type="text" class="form-control" name="contact" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" value="{{$library_information->contact}}" required>
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
