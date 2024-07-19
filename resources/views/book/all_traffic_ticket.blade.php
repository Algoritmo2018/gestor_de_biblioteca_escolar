<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Estudantes com multa</title>
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
                                <input type="text" class="form-control" name="course"
                                    id="validationDefaultUsername" placeholder="Ex: arte"  aria-describedby="inputGroupPrepend2" >
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
<h4>Estuadantes com multa</h4>
              <table class="table">
                <thead>
                  <tr>

                    <th scope="col">Nome do estudante</th>
                    <th scope="col">Divida</th>
                    <th scope="col">Estado</th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($traffic_ticket as $traffic_ticket)
                  <tr>

                        <td>{{$traffic_ticket->student->name}}</td>

                     <td>{{$traffic_ticket->debt}}</td>
                     @if($traffic_ticket->state == "on")
                    <td class="text-success">{{$traffic_ticket->state}}</td>
                    @else
                    <td class="text-danger">{{$traffic_ticket->state}}</td>
                    @endif
                    <td>{{$traffic_ticket->return_date}}</td>


                    <td><form action="{{ route('buy.traffic_ticket', $traffic_ticket->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <a  onclick="event.preventDefault();
                            this.closest('form').submit();" class="text-primary">Liquidar</a></form></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </main>

          </a>
        </div>
      </div></body>

</html>
