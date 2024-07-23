<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Adicionar meus dados</title>
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
                <!--Message error-->
                @include('partials/error')
                <!--fim message error-->
                <!-- Formulario de cadastro-->
                <div class="container d-flex justify-content-center mt-3 mb-2">

                    <form action="{{ route('store.library_information') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4>Adicionar meus dados</h4>
                        <hr class="mb-3">
                        <div class="form-floating">



                            <div class="col-md-12 mb-3">
                                <label for="validationDefaultUsername">Bilhete de identidade</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">B.I.</span>
                                    </div>
                                    <input type="text" class="form-control" name="bi"
                                        id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                        value="{{ old('bi') }}" required>
                                </div>
                                <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
                                    <x-input-error :messages="$errors->get('bi')" class="mt-1" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationDefaultUsername">Residência</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">R</span>
                                    </div>
                                    <input type="text" class="form-control" name="residence"
                                        id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                        value="{{ old('residence') }}" required>
                                </div>
                                <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
                                    <x-input-error :messages="$errors->get('residence')" class="mt-1" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationDefaultUsername">Contacto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">C</span>
                                    </div>
                                    <input type="text" class="form-control" name="contact"
                                        id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                        value="{{ old('contact') }}" required>
                                </div>
                                <div class="col-12 error_one" style="color: rgb(161, 8, 8)">
                                    <x-input-error :messages="$errors->get('contact')" class="mt-1" />
                                </div>
                            </div>

                        </div>


                        <button class="btn btn-danger" type="button">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>


                <!--fim Formulario de cadastro-->
            </main>

            </a>
        </div>
    </div>
</body>

</html>
