<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!--links-->
@include('partials/links')
<!--fim links-->
  <title>Cadastrar Categoria</title>
  <style>
    a{
      text-decoration: none;
    }
  </style>
</head>

<body>
  <!--Navbar-->
@include('partials/navbar')
<!--fim Navbar-->
  <!--Message success-->
  @include('partials/message')
  <!--fim message success-->
  <!-- Formulario de cadastro-->
  <div class="container d-flex justify-content-center mt-3 mb-2">

    <form action="{{route('store.category')}}" method="POST">
        @csrf()
    <h4>Cadastrar Categoria</h4>
    <hr class="mb-3">
    <div class="form-floating">

      <div class="col-md-12 mb-3">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">C</span>
          </div>
          <input type="text" class="form-control" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" name="category" value="{{old('categoria')}}" required>
        </div>
      </div>
        </div>


      <button class="btn btn-primary" type="submit">Guardar</button>
  </form></div>
  <!--fim Formulario de cadastro-->



</body>

</html>
