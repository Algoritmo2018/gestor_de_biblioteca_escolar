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



                    <a href="{{route('profile.edit')}}" class="dropdown-item" target="blank">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

    <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
                    this.closest('form').submit();">Terminar sessão</a>

                    </form>


          </div>
        </li>
      </ul>
    </div>
  </nav>
