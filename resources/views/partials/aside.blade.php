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
                <a href="#" class="sidebar-link" target="blank">Register</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link" target="blank">Forget Password</a>
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
            <a href="#" class="sidebar-link collapsed" data-bs-target="#cargahoraria" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Livro</a>
            <ul id="cargahoraria" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="{{route('create.book')}}" class="sidebar-link" target="blank">adicionar</a>
              </li>
              <li class="sidebar-item">
                <a href="{{route('all.book')}}" class="sidebar-link" target="blank">editar/eliminar</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#curso" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Curso</a>
            <ul id="curso" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="#" class="sidebar-link" target="blank">Adicionar</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link" target="blank">Editar/Eliminar</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#disciplina" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Disciplina</a>
            <ul id="disciplina" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="#" class="sidebar-link" target="blank">Adicionar</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link" target="blank">Editar/Eliminar</a>
              </li>
            </ul>
          </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed" data-bs-target="#turma" data-bs-toggle="collapse"
            aria-expanded="false">

            Gerir Nome das Turmas</a>
          <ul id="turma" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
           <li class="sidebar-item">
              <a href="#" class="sidebar-link" target="blank">Adicionar</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" target="blank">Editar/Eliminar</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed" data-bs-target="#professor" data-bs-toggle="collapse"
            aria-expanded="false">

            Gerir Professor</a>
          <ul id="professor" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
           <li class="sidebar-item">
              <a href="#" class="sidebar-link" target="blank">Adicionar</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" target="blank">Editar/Eliminar</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed" data-bs-target="#sala" data-bs-toggle="collapse"
            aria-expanded="false">

            Gerir Sala</a>
          <ul id="sala" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
           <li class="sidebar-item">
              <a href="#" class="sidebar-link" target="blank">Adicionar</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link" target="blank">Editar/Eliminar</a>
            </li>
          </ul>
        </li>



          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#turmax" data-bs-toggle="collapse"
              aria-expanded="false">

              Gerir Turma x</a>
            <ul id="turmax" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
             <li class="sidebar-item">
                <a href="#" target="blank" class="sidebar-link" target="blank">Adicionar</a>
              </li>
              <li class="sidebar-item">
                <a href="#" target="blank" class="sidebar-link" target="blank">Editar/Eliminar</a>
              </li>
            </ul>
          </li>




      </ul>
    </div>
  </aside>
