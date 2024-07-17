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
      <img src="{{asset('storage/img/book_cap/'.$book->image_path)}}"  style="height: 200px" alt="" class="img-fluid rounded  text-center w-20" >
      <h4 class="mt-2">{{$book->title}}</h4>
      <small><strong>Autor:</strong> {{$book->author->author}}</small>
      <small><strong>Editora:</strong> {{$book->publishing_company->publishing_company}}</small>
            <small ><strong>Categoria:</strong>{{ucfirst($book->category->category)}}</small>
            <small><strong>Ano de publicação:</strong> {{
                $book->number_of_copies}}</small>
            <small><strong>Copias/Examples:</strong> {{$book->year_of_publication}}</small>
<p class="tex-right">

      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar com grupos de botões">
        <div><a href="" class="btn btn-success">Emprestar</a><a href="{{route('edit.book',$book->id)}}" class="btn btn-primary ms-2 me-2">Editar</a></div>
        <form   action="{{route('destroy.book',$book->id)}}" method="POST">    @csrf
            @method('DELETE')
            <input type="hidden" class="form-control" name="image_path" id="validationDefaultUsername" value="{{$book->image_path}}"   aria-describedby="inputGroupPrepend2" >
           <a onclick="event.preventDefault();
            this.closest('form').submit();" class="btn btn-danger">Eliminar</a></form> </div>




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
