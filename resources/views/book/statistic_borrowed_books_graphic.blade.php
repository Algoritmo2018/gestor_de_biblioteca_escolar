<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Dados estátisticos</title>
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
    <?php $data_actual = date('Y-m-d H:i:s'); ?>
    <div class="wrapper">

        @include ('partials/aside')


        <div class="main">
            @include('partials/nav')



            <main class="content px-3 py-2" style="background-color: rgb(170, 170, 170)">
                <div class="container d-flex  justify-content-center mt-3 mb-2">

                    <form action="{{ route('all.student') }}" method="GET">
                        @csrf
                        <div class="form-floating">
                            <div class="col-md-12 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="course"
                                        id="validationDefaultUsername" placeholder=""
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
                    <h4 style="color: black">Dados estatisticos de livros emprestados - grafico</h4>

                    <div style="width: 100%; height:100%;">
                        <canvas id="grafico1" style="width: 50%; height: 50%;"> </canvas></div>
                            <script>
                                const ctx = document.getElementById('grafico1');
                                let labelsx=<?php echo json_encode($title); ?>;
            let valoresy=<?php echo json_encode($borrowed_book_count); ?>


                                new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: labelsx,
                                    datasets: [{
                                      label: 'quantidade-titulo',
                                      data: valoresy,
      Color: '#36A2EB',
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


                              <div style="width: 20%; height:20%;">
                                <canvas id="grafico2" style="width: 50%; height: 50%;"> </canvas></div>


                </div>
            </main>

            </a>
        </div>
    </div>
</body>

</html>
