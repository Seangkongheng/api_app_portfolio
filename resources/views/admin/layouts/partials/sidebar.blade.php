<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #102341;">
    <!-- Brand Logo -->

    <a href="{{ route('dashboard.index') }}"
        class="brand-link d-flex align-items-center justify-content-center gap-2 py-3"
        style="background-color: #1e293b;">
        <i class="bi bi-hexagon-fill text-info fs-4"></i> &nbsp;
        <span class="fw-bold text-white fs-5">Heng</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar" >
        <nav class="mt-2" >
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- User & Blog Management -->
                <li class="nav-header">USER & BLOG</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>Users <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('user.index') }}" class="nav-link">
                                <p>All Users</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('user.create') }}" class="nav-link">
                                <p>Create User</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-blog"></i>
                        <p>Blog <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('blog.index') }}" class="nav-link">
                                <p>All Blogs</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('blog.create') }}" class="nav-link">
                                <p>Create Blog</p>
                            </a></li>
                    </ul>
                </li>

                <!-- Portfolio Sections -->
                <li class="nav-header">PORTFOLIO</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Brands & Names <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('brand.index') }}" class="nav-link">
                                <p>Brands</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('brand.create') }}" class="nav-link">
                                <p>Create Brand</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('name.index') }}" class="nav-link">
                                <p>Names</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('name.create') }}" class="nav-link">
                                <p>Create Name</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>About & Experience <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">
                                <p>About</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('about.create') }}" class="nav-link">
                                <p>Create About</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('experience.index') }}" class="nav-link">
                                <p>Experience</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('experience.create') }}" class="nav-link">
                                <p>Create Experience</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>Education <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('education.index') }}" class="nav-link">
                                <p>Education</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('education.create') }}" class="nav-link">
                                <p>Create Education</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-language"></i>
                        <p>Skills & Languages <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('language.index') }}" class="nav-link">
                                <p>Languages</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('language.create') }}" class="nav-link">
                                <p>Create Language</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('skill.index') }}" class="nav-link">
                                <p>Skills</p>
                            </a></li>
                    </ul>
                </li>

                <!-- Projects & Gallery -->
                <li class="nav-header">PROJECTS & MEDIA</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>Projects <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('project.index') }}" class="nav-link">
                                <p>All Projects</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('project.create') }}" class="nav-link">
                                <p>Create Project</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link">
                                <p>Categories</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Gallery <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('gallery.index') }}" class="nav-link">
                                <p>Galleries</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('gallery.create') }}" class="nav-link">
                                <p>Add Gallery</p>
                            </a></li>
                    </ul>
                </li>

                <!-- Other Sections -->
                <li class="nav-header">OTHERS</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Curriculum Vitae <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('cv.index') }}" class="nav-link">
                                <p>Curriculum Vitae</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('cv.create') }}" class="nav-link">
                                <p>Add Curriculum Vitae</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Tools <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('tool.index') }}" class="nav-link">
                                <p>Tools</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('tool.create') }}" class="nav-link">
                                <p>Add Tool</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>Favorites <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('favorite.index') }}" class="nav-link">
                                <p>Favorites</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('favorite.create') }}" class="nav-link">
                                <p>Add Favorite</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Contact <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link">
                                <p>Contact</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('contact.create') }}" class="nav-link">
                                <p>Create Contact</p>
                            </a></li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-header"></li>
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
