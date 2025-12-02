 @php
     $menus = [
        (object) [
            "title" => "Produk",
            "path" => "products",
            "icon" => "fas fa-th",
        ],
        (object) [
            "title" => "Kategori",
            "path" => "category",
            "icon" => "fas fa-layer-group",
        ],
        (object)[
          "title" => "logout",
          "path" => "logout",
          "icon" => "fas fa-sign-out-alt"
        ]
     ];
 @endphp
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('templates/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @foreach ($menus as $menu)
          
          <li class="nav-item">
            <a href="{{ $menu->path[0] !== '/' ? '/' . $menu->path : $menu->path}}" class="nav-link  {{ request()->path() == $menu->path ? 'active' : '' }}">
              <i class="nav-icon {{ $menu->icon }}"></i>
              <p>
                {{ $menu->title }}
              </p>
            </a>
          </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>