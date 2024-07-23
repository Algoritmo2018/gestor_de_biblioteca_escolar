<aside id="sidebar">
    <!-- Content For Slidebar -->
    <div class="h-100">
      <div class="sidebar-logo">
        <a href="#">Library</a>
      </div>
      <ul class="sidebar-nav">
        <li class="sidebar-header">

          <a href="#">Admin Elements</a>
        </li>

        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
              aria-expanded="false">
              <i class="fa-regular fa-user pe-2"></i>
              Auth</a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                           <li class="sidebar-item">
                <a href="{{route('register')}}" class="sidebar-link" target="blank">Register</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('password.request')}}" class="sidebar-link" target="blank">Forget Password</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#author" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Autor</a>
            <ul id="author" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="{{route('create.author')}}" class="sidebar-link" target="blank">adicionar</a>
              </li>
              <li class="sidebar-item mb-1">
                <a href="{{route('all.author')}}" class="sidebar-link" target="blank">editar/eliminar</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#usuario" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Bibliotecario</a>
            <ul id="usuario" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="{{route('create.library_information')}}" class="sidebar-link" target="blank">adicionar</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('show.library_information')}}" class="sidebar-link" target="blank">editar/eliminar</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#calendario" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Categorias</a>
            <ul id="calendario" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="{{route('create.category')}}" class="sidebar-link" target="blank">adicionar</a>
              </li>
              <li class="sidebar-item mb-1">
                <a href="{{route('all.category')}}" class="sidebar-link" target="blank">editar/eliminar</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#course" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Cursos</a>
            <ul id="course" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="{{route('create.course')}}" class="sidebar-link" target="blank">adicionar</a>
              </li>
              <li class="sidebar-item mb-1">
                <a href="{{route('all.course')}}" class="sidebar-link" target="blank">editar/eliminar</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#editora" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Editora</a>
            <ul id="editora" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="{{route('create.publishing_company')}}" class="sidebar-link" target="blank">adicionar</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('all.publishing_company')}}" class="sidebar-link" target="blank">editar/eliminar</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#estudante" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Estudante</a>
            <ul id="estudante" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="{{route('create.student')}}" class="sidebar-link" target="blank">adicionar</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('all.student')}}" class="sidebar-link" target="blank">editar/eliminar</a>
              </li>
            </ul>
          </li>

          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#cargahoraria" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Livro</a>
            <ul id="cargahoraria" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="{{route('create.book')}}" class="sidebar-link" target="blank">adicionar</a>
              </li> 
              <li class="sidebar-item">
                <a href="{{route('all.loan.book')}}" class="sidebar-link" target="blank">emprestados</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('all.book_return')}}" class="sidebar-link" target="blank">devolvidos</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('all.traffic_ticket')}}" class="sidebar-link" target="blank">estudantes com multa</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('statistic')}}" class="sidebar-link" target="blank">estatistica</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('graphic')}}" class="sidebar-link" target="blank">grafico de livros emprestados</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('graphic2')}}" class="sidebar-link" target="blank">grafico de livros emprestados por mes</a>
              </li>
            </ul>
          </li>



      </ul>
    </div>
  </aside>
