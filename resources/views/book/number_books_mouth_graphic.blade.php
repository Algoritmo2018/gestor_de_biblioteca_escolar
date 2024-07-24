<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>grafico2</title>
    <!--links-->
    @include('partials/links')
    <!--fim links-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        a {
            text-decoration: none;
        }

    </style>

</head>

<body style="">
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


<?php
$valores = [];
array_push($valores,$j);
array_push($valores,$f);
array_push($valores,$marco);
array_push($valores,$abril);
array_push($valores,$maio);
array_push($valores,$junho);
array_push($valores,$julho);
array_push($valores,$agosto);
array_push($valores,$setembro);
array_push($valores,$outubro);
array_push($valores,$novembro);
array_push($valores,$dezembro); ?>

<div class="wrapper">

        @include ('partials/aside')


        <div class="main">
            @include('partials/nav')



            <main class="content px-3 py-2" style="background-color: rgb(170, 170, 170)">

                <!--Message success-->
                @include('partials/message')
                <!--fim message success-->
                <div class="card-body">
                    <h4 style="color: black">Livros emprestados por mes</h4>

                    <div style="width: 100%; max-height:200px;">
                        <canvas id="grafico1" style="width: 100%; max-height: 200px;"> </canvas></div>
                            <script>
                                const ctx = document.getElementById('grafico1');
                                let labelsx=["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
            let valoresy = <?php echo json_encode($valores); ?>


                                new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: labelsx,
                                    datasets: [{
                                      label: 'quantidade-mês',
                                      data: valoresy,
                                      borderWidth: 1
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      y: {
                                        beginAtZero: true
                                      }
                                    }
                                  }
                                });
                              </script>




                </div>
            </main>

            </a>
        </div>
    </div>
</body>

</html>
