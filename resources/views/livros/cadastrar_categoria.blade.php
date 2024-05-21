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

  <!-- Formulario de cadastro-->
  <div class="container d-flex justify-content-center mt-3 mb-2">

  <form>
    <h6>Criar Categoria</h6>
    <hr class="mb-3">
    <div class="form-floating">

      <div class="col-md-12 mb-3">
        <label for="validationDefaultUsername">Categoria</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">C</span>
          </div>
          <input type="text" class="form-control" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
        </div>
      </div>
        </div>


      <button class="btn btn-primary" type="submit">Guardar</button>
  </form></div>


  <!--fim Formulario de cadastro-->


  <div class=" d-md-none d-lg-none d-sm-none d-block"  style="height: 250px;"></div>
<div class="col-md d-sm-none d-lg-none d-md-block d-none"  style="height: 150px;"></div>
<div class="col-lg d-md-none d-sm-none d-lg-block d-none"  style="height: 130px;"></div>
<div class="col-sm d-md-none d-lg-none d-sm-block d-none"  style="height: 280px;"></div>



 <!--Rodape-->
   <!--Rodape-->
 @include('partials/footer')
<!--Fim do Rodape-->
<!--Fim do Rodape-->
</body>

</html>
