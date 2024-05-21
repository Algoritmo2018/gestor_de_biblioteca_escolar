<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!--links-->
@include('partials/links')
<!--fim links-->
  <title>Cadastrar livro</title>
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
    <h4>Cadastrar livro</h4>
    <hr class="mb-3">
    <div class="form-floating">

      <div class="col-md-12 mb-3">
        <label for="validationDefaultUsername">Titulo</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">T</span>
          </div>
          <input type="text" class="form-control" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
        </div>
      </div>
    <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Autor:</label>
            </div>
            <select class="form-select  col-md-12 rounded-2" id="inputGroupSelect01">
              <option selected>Escolher...</option>
              <option value="1">Arte</option>
              <option value="2">Tecnologia</option>
              <option value="3">Politica</option>
            </select>
          </div>
      <div class="col-md-12 mb-3">
        <label for="validationDefaultUsername">Data</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">D</span>
          </div>
          <input type="date" class="form-control" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
        </div>
      </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
            </div>
            <select class="form-select  col-md-12 rounded-2" id="inputGroupSelect01">
              <option selected>Escolher...</option>
              <option value="1">Arte</option>
              <option value="2">Tecnologia</option>
              <option value="3">Politica</option>
            </select>
          </div>

          <div class="form-floating mt-3"><textarea class="form-control mb-2" name="" id="msg" style="height: 100px;"
            placeholder=" " cols="30" rows="10"></textarea>
        <label for="msg">Resumo sobre o livro:</label>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationDefaultUsername">Capa</label>
      <div class="input-group">
        <input type="file" class="form-control" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
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
