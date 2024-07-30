<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>cursos</title>
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

                    <form action="{{ route('all.course') }}" method="GET">
                        @csrf
                        <div class="form-floating">
                            <div class="col-md-12 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="course"
                                        id="validationDefaultUsername" placeholder="Ex: informatica"
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
                                <th scope="col">Cursos</th>

                                <th scope="col"> </th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course as $course)
                                <tr>

                                    <td>{{ $course->course }}</td>
                                    <td><a href="{{ route('edit.course', $course->id) }}"
                                            class="text-primary">Editar</a></td>
                                    <td>
                                        <a onclick="event.preventDefault();
                            this.closest('form').submit();"
                                            class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-{{ $course->id }}">Eliminar</a>
                                        @component('components.modal_delete')
                                            @slot('id')
                                                {{ $course->id }}
                                            @endslot
                                            @slot('route')
                                                {{ route('destroy.course', $course->id) }}
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
