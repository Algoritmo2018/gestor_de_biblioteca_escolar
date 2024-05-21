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
 <!--Navbar-->
@include('partials/navbar')
<!--fim Navbar-->

  <main class="mt-3">
    <div class="container d-flex flex-column  align-items-center">
      <img src="{{asset('storage/img/book_cap/'.$book->image_path)}}"  style="height: 80px" alt="" class="img-fluid rounded  text-center h-25 w-25" >
      <h4 class="mt-2">{{$book->title}}</h4>
      <small><strong>Autor:</strong> {{$book->author->author}}</small>
      <small><strong>Editora:</strong> {{$book->publishing_company->publishing_company}}</small>
            <small ><strong>Categoria:</strong>{{ucfirst($book->category->category)}}</small>
<p class="tex-right">
      <strong>Descrição:</strong> {{$book->content}}</p>

      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar com grupos de botões">
        <div><a href="" class="btn btn-success">Emprestar</a></div>
      </div>




    </div>
  </main>


<div class=" d-md-none d-lg-none d-sm-none d-block"  style="height: 250px;"></div>
<div class="col-md d-sm-none d-lg-none d-md-block d-none"  style="height: 150px;"></div>
<div class="col-lg d-md-none d-sm-none d-lg-block d-none"  style="height: 130px;"></div>
<div class="col-sm d-md-none d-lg-none d-sm-block d-none"  style="height: 280px;"></div>

 <!--Rodape-->
 @include('partials/footer')
<!--Fim do Rodape-->
</body>

</html>
