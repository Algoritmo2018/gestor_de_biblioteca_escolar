<!DOCTYPE html>
<html lang="pt-br">

<head>
<!--links-->
@include('partials/links')
<!--fim links-->
  <title>Biblioteca</title>
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

<!--Menu de links-->
<div class="container mt-4">

  <div class="row pb-3">
      <div class="col-12">
          <div class="d-flex flex-row justify-content-center justify-content-md-center">

              <nav class="d-inline-block me-3 ">
                  <ul class="pagination pagination-sm my-0">
                      <li class="page-item">
                          <a class="page-link text-bg-dark fs-5" href="#">1</a>
                      </li>
                      <li class="page-item">
                          <a class="page-link text-bg-dark fs-5" href="#">2</a>
                      </li>
                      <li class="page-item disabled">
                          <a class="page-link text-bg-dark fs-5" href="#">3</a>
                      </li>
                      <li class="page-item">
                          <a class="page-link text-bg-dark fs-5" href="#">4</a>
                      </li>
                      <li class="page-item">
                          <a class="page-link text-bg-dark fs-5" href="#">5</a>
                      </li>
                      <li class="page-item">
                          <a class="page-link text-bg-dark fs-5" href="#">6</a>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
  </div><hr class="mt-1"></div>
  <!--Fim Menu de links-->
 <!--Tecnologia-->
 <div class="container py-5">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

    @foreach ($book as $book)
    <div class="col" data-anima="esquerda">
        <div class="card h-100">
          <img src="{{asset('storage/img/book_cap/'.$book->image_path)}}" style="height: 150px" alt="" class="card-img-top">
          <div class="card-body">

            <p class="card-text">{{$book->title}}</p>
      <div><a href="" class="btn btn-success">Emprestar</a>
        <a href="{{route('show.book',$book->id)}}" target="__blank" class="btn btn-primary">Detalhes</a></div>
          </div>
  </div></div>
  @endforeach
</div>
</div>
<!--Fim  Tecnologia-->

<!--Menu de links-->
<div class="container"><hr class="mt-3">

<div class="row pb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-center justify-content-md-center">

            <nav class="d-inline-block me-3 ">
                <ul class="pagination pagination-sm my-0">
                    <li class="page-item">
                        <a class="page-link text-bg-dark fs-5" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-bg-dark fs-5" href="#">2</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-bg-dark fs-5" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-bg-dark fs-5" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-bg-dark fs-5" href="#">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-bg-dark fs-5" href="#">6</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div><hr class="mt-1"></div>
<!--Fim Menu de links-->
<div class=" d-md-none d-lg-none d-sm-none d-block"  style="height: 250px;"></div>
<div class="col-md d-sm-none d-lg-none d-md-block d-none"  style="height: 150px;"></div>
<div class="col-lg d-md-none d-sm-none d-lg-block d-none"  style="height: 130px;"></div>
<div class="col-sm d-md-none d-lg-none d-sm-block d-none"  style="height: 280px;"></div>

 <!--Rodape-->
 @include('partials/footer')
<!--Fim do Rodape-->
</body>

</html>
