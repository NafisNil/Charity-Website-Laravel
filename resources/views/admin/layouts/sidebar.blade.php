  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('dashboard') }}" class="brand-link">
          <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AlWafa Foundation</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <a href="{{ route('logout') }}" class="nav-link"
                                      onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Logout</p>
                                  </a>
                              </form>
                          </li>

                      </ul>
                  </li>
                  @php
                      $prefix = Request::route()->getPrefix();
                      $route = Request::route()->getName();
                  @endphp
                  <li class="nav-item">
                      <a href="{{ route('slider.index') }}"
                          class="nav-link {{ $route == 'slider.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Slider</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('about.index') }}"
                          class="nav-link {{ $route == 'about.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>About</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('partner.index') }}"
                          class="nav-link {{ $route == 'partner.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Partner</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('campaign.index') }}"
                          class="nav-link {{ $route == 'campaign.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Campaign</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('metric.index') }}"
                          class="nav-link {{ $route == 'metric.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Metric</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('event.index') }}"
                          class="nav-link {{ $route == 'event.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Event</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('blogCategory.index') }}"
                          class="nav-link {{ $route == 'blogCategory.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Blog Category</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('blog.index') }}"
                          class="nav-link {{ $route == 'blog.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Blog </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('gallery.index') }}"
                          class="nav-link {{ $route == 'gallery.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Gallery </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('contact.index') }}"
                          class="nav-link {{ $route == 'contact.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Contact </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('social.index') }}"
                          class="nav-link {{ $route == 'social.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Social Media </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('service.index') }}"
                          class="nav-link {{ $route == 'service.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Services </p>
                      </a>
                  </li>

                  <hr>

                  <li class="nav-item">
                      <a href="{{ route('volunteer.index') }}"
                          class="nav-link {{ $route == 'volunteer.index' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Volunteer Application </p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
