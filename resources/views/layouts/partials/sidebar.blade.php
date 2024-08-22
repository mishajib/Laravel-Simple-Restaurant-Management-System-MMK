<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('assets/backend/img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal">
            Dashboard
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ routeIs('admin.sliders.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                    <i class="material-icons">slideshow</i>
                    <p>Slider</p>
                </a>
            </li>

            <li class="nav-item {{ routeIs('admin.categories.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="material-icons">apps</i>
                    <p>Category</p>
                </a>
            </li>

            <li class="nav-item {{ routeIs('admin.items.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.items.index') }}">
                    <i class="material-icons">file_copy</i>
                    <p>Item</p>
                </a>
            </li>

            <li class="nav-item {{ routeIs('admin.reservation.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.reservation.index') }}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Reservations</p>
                </a>
            </li>

            <li class="nav-item {{ routeIs('admin.contact.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.contact.index') }}">
                    <i class="material-icons">message</i>
                    <p>Contact Message</p>
                </a>
            </li>
        </ul>
    </div>
</div>
