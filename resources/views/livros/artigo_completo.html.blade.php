<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!--links-->
@include('partials/links')
<!--fim links-->
  <title>Livro</title>
  <style>
    a{
      text-decoration: none;
    }
  </style>
</head>

<body>
  <nav class="navbar bg-dark navbar-dark  navbar-expand-sm sticky-top">
    <div class="container ">
      <a href="" class="navbar-brand d-flex align-items-center">
        <i class="bi-newspaper fs-1 me-2"></i>Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse d-lg-flex flex-column" id="menuNavbar">
        <div class="navbar-nav ms-auto">
          <a href="index.html" class="nav-link  active">Home</a>
          <a class="nav-link" href="#painel" data-bs-toggle="offcanvas">Pesquisar</a>
          <a href="#categorias" class="nav-link" data-bs-toggle="offcanvas">Mais</a>



        </div>
      </div>

    </div>
  </nav>
  <!--Painel de pesquisa-->
  <div class="offcanvas offcanvas-top text-bg-dark" id="painel" tabindex="1" data-bs-scroll="true"
    data-bs-backdrop="static" style="--bs-offcanvas-heigth:100px;">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Pesquisar</h5>
      <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <div class="input-group mt-2">
        <input type="search" name="" id="" class="form-control">
        <button class="btn btn-primary">
          <i class="bi-search"></i>
        </button>
      </div>
    </div>

  </div>
  <!--fim Painel de pesquisa-->
  <!--Painel de categorias-->
  <div class="offcanvas offcanvas-start text-bg-dark" id="categorias" tabindex="1" data-bs-scroll="true"
    data-bs-backdrop="static" style="--bs-offcanvas-width:250px;">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Links</h5>
      <button class="btn-close btn btn-light" data-bs-dismiss="offcanvas"></button>
    </div>
    <div style="margin-bottom: -13px;"></div>
    <div class="offcanvas-body">
       <ul class="pagination d-flex flex-column justify-content-start">
         <li class="page-item mb-2">
          <a href="cadastrar-se.html" class="nav-link">Cadastrar-se</a>
        </li><li class="page-item mb-2">
            <a href="login.html" class="nav-link">Login</a>
        </li>
      </ul>
      </div>
      <div style="margin-bottom: -100px;"></div>
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Categorias</h5>
    </div>
    <div style="margin-bottom: -13px;"></div>
    <div class="offcanvas-body">
       <ul class="pagination d-flex flex-column justify-content-start ">
         <li class="page-item mb-2">
          <a href="#" class="text-white">Arte</a>
        </li>   <li class="page-item mb-2">
          <a href="#" class="text-white">Cultura</a>
        </li><li class="page-item mb-2">


          <a href="#" class="text-white">Desporto</a>
        </li>
        <li class="page-item mb-2">
          <a href="#" class="text-white">Entrevista</a>
        </li>
        <li class="page-item mb-2">
          <a href="#" class="text-white">Economia</a>
        </li>
        <li class="page-item mb-2">
          <a href="#" class="text-white">Moda</a>
        </li>
        <li class="page-item mb-2">
          <a href="#" class="text-white">Politica</a>
        </li>

        <li class="page-item mb-2">
          <a href="#" class="text-white">Tecnologia</a>
        </li>
        <li class="page-item">
          <a href="#" class="text-white">Regiões</a>
        </li>


      </ul>
      </div>

  </div>
  <!--fim Painel de categorias-->



  <main class="mt-3">
    <div class="container d-flex flex-column">
      <img src="img/gemini.jpg" alt="" class="img-fluid rounded  text-center h-50 w-50" >
      <small class="mt-2">Tecnologia - JAN 04, 2024</small>
      <h6 class="mt-2">Nova inteligencia Atrifical do google</h6>
      <small>Autor: Joaquina</small>
      <small>Editora: Joaquina</small>
      <p class="tex-right">
      Descrição: Id Lorem eu ullamco id sint aliquip deserunt exercitation quis ex occaecat. Exercitation sint eiusmod do do laboris sint enim reprehenderit cillum cupidatat. Voluptate culpa dolor duis ipsum dolore excepteur ea et ea amet..</p>
      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar com grupos de botões">
        <div><a href="" class="btn btn-success">Emprestar</a> <a href="artigo_completo.html" class="btn btn-primary">Detalhes</a></div>
      </div>




    </div>
  </main>


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
