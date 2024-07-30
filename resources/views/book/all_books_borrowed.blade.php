<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Livros emprestados</title>
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
    <?php $data_actual = date('Y-m-d H:i:s'); ?>
    <div class="wrapper">

        @include ('partials/aside')


        <div class="main">
            @include('partials/nav')



            <main class="content px-3 py-2">
                <div class="container d-flex  justify-content-center mt-3 mb-2">

                    <form action="{{ route('all.loan.book') }}" method="GET">
                        @csrf
                        <div class="form-floating">
                            <div class="col-md-12 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="book_title"
                                        id="validationDefaultUsername" placeholder="Ex: Matemática 3"
                                        aria-describedby="inputGroupPrepend2">
                                    <input type="text" class="form-control" name="student_name"
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
                    <h4>Livros emprestados</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome do livro</th>
                                <th scope="col">Nome do estudante</th>
                                <th scope="col">Nome do bibliotecario</th>
                                <th scope="col">Data de emprestimo</th>
                                <th scope="col">Data de devolução</th>
                                <th scope="col">Obs</th>
                                <th scope="col">Gerar multa</th>
                                <th scope="col">Devolvendo livro</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowed_book as $borrowed_book)
                                <tr>

                                    <td>{{ $borrowed_book->book->title }}</td>
                                    <td>{{ $borrowed_book->student->name }}</td>
                                    <td>{{ $borrowed_book->user->name }}</td>
                                    <td>{{ $borrowed_book->date_borrowed }}</td>
                                    <td>{{ $borrowed_book->return_date }}</td>
                                    <td>{{ $borrowed_book->observation }}</td>
                                    <td>
                                        <?php $c = 0; ?>
                                        @foreach ($traffic_ticket as $traffic_ticket2)
                                            @if ($traffic_ticket2->borrowed_book_id == $borrowed_book->id)
                                                <?php $c = $c + 1;
                                                break; ?>
                                            @endif
                                        @endforeach
                                        @if ($borrowed_book->return_date < $data_actual && $c == 0)
                                            <form action="{{ route('store.traffic_ticket', $borrowed_book->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="student_id"
                                                    value="{{ $borrowed_book->student->id }}">
                                                <a onclick="event.preventDefault();
        this.closest('form').submit();"
                                                    class="text-success">Registar</a>
                                            </form>
                                        @endif
                                    </td>

                                    <td>
                                        <?php $c = 0; ?>
                                        @foreach ($book_return as $book_return2)
                                            @if ($book_return2->borrowed_book_id == $borrowed_book->id)
                                                <?php $c = $c + 1;
                                                break; ?>
                                            @endif
                                        @endforeach
                                        @if ($c == 0)
                                            <form action="{{ route('store.book_return', $borrowed_book->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="student_id"
                                                    value="{{ $borrowed_book->student->id }}">
                                                <input type="hidden" name="book_id"
                                                    value="{{ $borrowed_book->book->id }}">

                                                <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                                    class="text-success">Registar</a>
                                            </form>
                                        @endif
                                    </td>

                                    <td>

                                            <a data-bs-toggle="modal" data-bs-target="#delete-{{ $borrowed_book->id }}"
                                                class="text-danger">Eliminar</a>
                                                @component('components.modal_delete')
                                                @slot('id')
                                                    {{ $borrowed_book->id }}
                                                @endslot
                                                @slot('route')
                                                    {{ route('destroy.loan.book', $borrowed_book->id) }}
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
