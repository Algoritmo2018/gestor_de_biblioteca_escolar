<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Editando Estudante</title>
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

    <form action="{{route('update.student',$student->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
      <h4>Editando estudante</h4>
      <hr class="mb-3">
      <div class="form-floating">

        <div class="col-md-12 mb-3">
          <label for="validationDefaultUsername">Nome</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend2">N</span>
            </div>
            <input type="text" class="form-control" name="name" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" value="{{$student->name}}" required>
          </div>

          <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
            <x-input-error :messages="$errors->get('name')"   class="mt-1" />
            </div>
        </div>
      <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Tipo:</label>
              </div>
              <select class="form-select  col-md-12 rounded-2" name="type" id="inputGroupSelect01">

                <option selected>{{$student->type}}</option>
                <option value="Externo" >Externo</option>
                <option value="Interno" >Interno</option>

              </select>

          <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
            <x-input-error :messages="$errors->get('type')"   class="mt-1" />
            </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Curso:</label>
                </div>
                <select class="form-select  col-md-12 rounded-2" name="course_id" id="inputGroupSelect01">
                     <option  value="">{{$student->course->course}}</option>
@foreach ($course as $course)
<option  value="{{$course->id}}">{{$course->course}}</option>
@endforeach
                </select>

          <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
            <x-input-error :messages="$errors->get('course_id')"   class="mt-1" />
            </div>
              </div>


              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Bilhete de identidade</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">B.I.</span>
                  </div>
                  <input type="text" class="form-control" name="bi" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" value="{{$student->bi}}" required>
                </div>

          <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
            <x-input-error :messages="$errors->get('bi')"   class="mt-1" />
            </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Residência</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">R</span>
                  </div>
                  <input type="text" class="form-control" name="residence" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" value="{{$student->residence}}" required>
                </div>

          <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
            <x-input-error :messages="$errors->get('residence')"   class="mt-1" />
            </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Contacto</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">C</span>
                  </div>
                  <input type="text" class="form-control" name="contact" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" value="{{$student->contact}}" required>
                </div>

          <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
            <x-input-error :messages="$errors->get('contact')"   class="mt-1" />
            </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">E</span>
                  </div>
                  <input type="email" class="form-control" name="email" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" value="{{$student->email}}" required>
                </div>

          <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
            <x-input-error :messages="$errors->get('email')"   class="mt-1" />
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
