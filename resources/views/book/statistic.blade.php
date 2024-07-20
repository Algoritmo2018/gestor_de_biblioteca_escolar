<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Dados estátisticos</title>
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

                    <form action="{{ route('all.student') }}" method="GET">
                        @csrf
                        <div class="form-floating">
                            <div class="col-md-12 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="course"
                                        id="validationDefaultUsername" placeholder="Ex: arte"
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
                    <h4>Dados estatisticos Livros emprestados</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nª</th>
                                <th scope="col">Nome do livro</th>
                                <th scope="col">Nª de emprestimos</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 0; ?>
                            @foreach ($book as $book)
                                <?php $c = $c + 1; ?>
                                <tr>
                                    <td>{{ $c }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->borrowed_book_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <?php
                    $j =0;
    $f = 0;
    $marco = 0;
    $abril = 0;
    $maio = 0;
    $junho = 0;
    $julho = 0;
    $agosto = 0;
    $setembro = 0;
    $outubro = 0;
    $novembro = 0;
    $dezembro = 0;
                    ?>
@foreach ($borrowed_book as $d)
<?php
    $formatada = new DateTime($d->date_borrowed);
    $mes = $formatada->format('m');

    if($mes == 01){
$j = $j+ 1;
    }
    if($mes == "02"){
$f = $f+ 1;
    }
    if($mes == "03"){
$marco = $marco + 1;
    }
    if($mes == "04"){
$abril = $abril + 1;
     }
    if($mes == "05"){
$maio = $maio + 1;
    }
    if($mes == "06"){
$junho = $junho + 1;
    }
    if($mes == "07"){
$julho = $julho + 1;
    }
    if($mes == "08"){
$agosto = $agosto + 1;
    }
    if($mes == "09"){
$setembro = $setembro + 1;
    }
    if($mes == "10"){
 $outubro =  $outubro + 1;
    }
    if($mes == "11"){
$novembro  = $novembro + 1;
    }
    if($mes == "12"){
$dezembro = $dezembro + 1;
    }
?>

@endforeach

                    <h4>Emprestimos em cada mês</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mês</th>
                                <th scope="col">Quant de emprestimos</th>


                            </tr>
                        </thead>
                        <tbody>



                            <tr>

                                <td>Janeiro</td>
                                <td> {{ $j }}</td>
                            </tr>
                            <tr>

                                <td>Fevereiro</td>
                                <td>{{ $f }}</td>
                            </tr>
                            <tr>

                                <td>Março</td>
                                <td> {{ $marco }}</td>
                            </tr>
                            <tr>

                                <td>Abril</td>
                                <td>{{ $abril }}</td>
                            </tr>
                            <tr>

                                <td>Maio</td>
                                <td>{{ $maio }}</td>
                            </tr>
                            <tr>

                                <td>Junho</td>
                                <td>{{ $junho }}</td>
                            </tr>
                            <tr>

                                <td>Julho</td>
                                <td>{{ $julho }}</td>
                            </tr>
                            <tr>

                                <td>Agosto</td>
                                <td>{{ $agosto }}</td>
                            </tr>
                            <tr>

                                <td>Setembro</td>
                                <td>{{ $setembro }}</td>
                            </tr>
                            <tr>

                                <td>Outubro</td>
                                <td>{{ $outubro }}</td>
                            </tr>
                            <tr>

                                <td>Novembro</td>
                                <td>{{ $novembro }}</td>
                            </tr>
                            <tr>

                                <td>Dezembro</td>
                                <td> {{ $dezembro }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </main>

            </a>
        </div>
    </div>
</body>

</html>
