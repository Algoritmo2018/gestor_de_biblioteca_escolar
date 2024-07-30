<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Estudantes</title>
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
                <div class="container d-flex  justify-content-center mt-3 mb-2">

                    <form action="{{ route('all.student') }}" method="GET">
                        @csrf
                        <div class="form-floating">
                            <div class="col-md-12 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name"
                                        id="validationDefaultUsername" placeholder="Ex: Chilembo"
                                        aria-describedby="inputGroupPrepend2">
                                    <button class="btn btn-primary" type="submit">Pesquisar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Message success-->
                @include('partials/message')
                <!--fim message success-->
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Curso</th>
                                <th scope="col">B.I.</th>
                                <th scope="col">Residencia</th>
                                <th scope="col">Contacto</th>
                                <th scope="col"> </th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $student)
                                <tr>

                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->type }}</td>
                                    <td>{{ $student->course->course }}</td>
                                    <td>{{ $student->bi }}</td>
                                    <td>{{ $student->residence }}</td>
                                    <td>{{ $student->contact }}</td>
                                    <td><a href="{{ route('edit.student', $student->id) }}"
                                            class="text-primary">Editar</a></td>
                                    <td>

                                        <a data-bs-toggle="modal" data-bs-target="#delete-{{ $student->id }}"
                                            class="text-danger">Eliminar</a>
                                        @component('components.modal_delete')
                                            @slot('id')
                                                {{ $student->id }}
                                            @endslot
                                            @slot('route')
                                                {{ route('destroy.student', $student->id) }}
                                            @endslot
                                            @slot('elements')

                                                @endslot
                                        @endcomponent
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>

            </a>
        </div>
    </div>
</body>

</html>
