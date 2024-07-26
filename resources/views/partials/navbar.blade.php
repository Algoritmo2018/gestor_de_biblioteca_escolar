<nav class="navbar bg-primary navbar-dark  navbar-expand-sm sticky-top">
    <div class="container ">
      <a href="" class="navbar-brand d-flex align-items-center">
        <img src="{{asset('img/logo.png')}}" style="height: 30px" alt=""> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse d-lg-flex flex-column" id="menuNavbar">
        <div class="navbar-nav ms-auto">
          <a href="{{route('show.home')}}" class="nav-link  active">Home</a>
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
        <form action="{{ route('show.home') }}" method="GET">
      <div class="input-group mt-2">
            @csrf
        <input type="search" name="book_title" id="" class="form-control">
        <button class="btn btn-primary" type="submit">

            <i class="bi-search"></i>
        </button>
      </div> </form>
    </div>

  </div>
  <!--fim Painel de pesquisa-->
  <!--Painel de categorias-->
  <div class="offcanvas offcanvas-start text-bg-dark" id="categorias" tabindex="1" data-bs-scroll="true"
    data-bs-backdrop="static" style="--bs-offcanvas-width:250px;">
    <div class="offcanvas-header d-flex justify-content-end">
      <button class="btn-close btn btn-light" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="d-flex flex-column ms-3">
        <h5 class="offcanvas-title mb-2">Links</h5>


         <ul class="pagination d-flex flex-column justify-content-start ">

          <li class="page-item mb-2">
              <a href="{{route('show.admin')}}" class="text-white" target="blank">Area adm</a>

          </li>

        </ul>
        </div>
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Categorias</h5>
    </div>
    <div style="margin-bottom: -25px;"></div>
    <div class="offcanvas-body">
       <ul class="pagination d-flex flex-column justify-content-start ">
        @foreach($category as $category2)

        <li class="page-item mb-2">
            <form action="{{ route('show.home') }}" method="GET">
                @csrf
                <input type="hidden" name="category" value="{{ $category2->id}}">
            <a href="#" class="text-white" onclick="event.preventDefault();
                    this.closest('form').submit();" >{{ucfirst($category2->category)}}</a>
            </form>
        </li>
@endforeach
      </ul>
      </div>

  </div>
  <!--fim Painel de categorias-->
