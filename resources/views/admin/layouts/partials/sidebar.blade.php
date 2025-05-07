
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link text-center">
      <span class="brand-text font-weight-light ">kongheng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon  fa-solid fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               My Brands
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('brand.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Brand</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               My Name
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('name.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Name</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('name.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Name</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                My about
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('about.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Abouts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('about.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crete</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                My experience
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('experience.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Experience</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('experience.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Experience</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Education
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('education.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Education</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('education.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Education</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My skill & Language
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('language.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lanugage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('language.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Language</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('skill.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Skills</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Contact
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contact.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contact.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Contact</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Projects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('project.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('project.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorys</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('gallery.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galleries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gallery.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Gallery</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Curriculum Vitae
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('cv.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curriculum Vitae</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cv.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Curriculum Vitae</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Tool 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tool.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tools</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tool.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Tools</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Favorite
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('favorite.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Favorite</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('favorite.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Favorite</p>
                </a>
              </li> 
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-circle-left text-danger"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>