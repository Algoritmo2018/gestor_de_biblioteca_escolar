<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Efectuar emprestimo</title>
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
     <form action="{{route('store.loan.book')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <h4>Efectuar emprestimo</h4>
      <hr class="mb-3">
      <div class="form-floating">


      <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Selecionar estudante:</label>
              </div>
              <select class="form-select  col-md-12 rounded-2" name="student_id" id="inputGroupSelect01">
                <option selected>Escolher...</option>
                @foreach ($student as $student)
                <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
              </select>
              <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
                <x-input-error :messages="$errors->get('student_id')"   class="mt-1" />
                </div>
            </div>

              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Data de emprestimo</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">D</span>
                  </div>
                  <input type="datetime-local" class="form-control" name="date_borrowed" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
                    <x-input-error :messages="$errors->get('date_borrowed')"   class="mt-1" />
                    </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefaultUsername">Data de devolução</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">D</span>
                  </div>
                  <input type="datetime-local" class="form-control" name="return_date" id="validationDefaultUsername"   aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
                    <x-input-error :messages="$errors->get('return_date')"   class="mt-1" />
                    </div>
              </div>
              <div class="form-floating mt-3"><textarea class="form-control mb-2" name="observation" id="msg" style="height: 100px;"
                placeholder=" " cols="30" rows="10">{{old('observation')}}</textarea>
            <label for="msg">Observação:</label>
            <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
                <x-input-error :messages="$errors->get('observation')"   class="mt-1" />
                </div>
        </div>
      <input type="hidden" name="book_id" value="{{$book_id}}">
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
