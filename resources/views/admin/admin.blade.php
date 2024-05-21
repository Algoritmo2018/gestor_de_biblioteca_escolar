<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Admin</title>
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
      <nav class="navbar navbar-expand px-3 border-bottom">
        <button class="btn" id="sidebar-toggle" onclick="toggleSidebar()" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                <img src="{{asset('img/profile.png')}}" class="avatar img-fluid rounded" alt="">
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item" target="blank">Perfil</a>
                              <form method="POST" action="">
                    @csrf
<a href="route('logout')" class="dropdown-item" onclick="event.preventDefault();
                this.closest('form').submit();">Terminar sessão</a>

                </form>

              </div>
            </li>
          </ul>
        </div>
      </nav>
      <main class="content px-3 py-2">
        <div class="container-fluid">
          <div class="mb-3">
            <h4>Admin</h4>
          </div>
          <div class="row">
            <div class="col-12 col-md-6 d-flex">
              <div class="card flex-fill border-0 illustration">
                <div class="card-body p-0 d-flex flex-fill">
                  <div class="row g-0 w-100">
                    <div class="col-6">
                      <div class="p-3 m-1">
                        <h4>Olá, sr(a) Luis</h4>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
          <!--Table Element-->

        </div>
      </main>

      </a>
    </div>
  </div>
</body>

</html>
