<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Editando Editora</title>
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
                <div class="container d-flex justify-content-center mt-3 mb-2">

                    <form action="{{ route('update.publishing_company', $publishing_company->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4 class="mb-lg-2">Editando Editora</h4>
                        <div class="form-floating">
                            <div class="col-md-12 mb-1">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">C</span>
                                    </div>

                                    <input type="text" class="form-control" name="publishing_company"
                                        id="validationDefaultUsername" value="{{ $publishing_company->publishing_company }}"
                                        aria-describedby="inputGroupPrepend2" required>
                                </div>
                            </div>
                        </div>
 {{-- <!--Apresenta mensagem de erro-->
@include('partials/error')
<!--fim Apresenta mensagem de erro--> --}}
                        <button class="btn btn-primary" type="submit">Atualizar</button>
                    </form>
                </div>


                <!--fim Formulario de cadastro-->
            </main>

            </a>
        </div>
    </div>
</body>

</html>
