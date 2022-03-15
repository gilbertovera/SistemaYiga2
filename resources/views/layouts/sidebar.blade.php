        
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Yiga Admin <sup>R</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href=/dashboard>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div> 

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-money-check-alt"></i>
                <span>Control Efectivo</span>
            </a>
            <div id="collapseTwo" class="collapse {{ Request::is('cashmovs*')||Request::is('dashboard*')||Request::is('cashcategories*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Opciones de control:</h6>
                    <a class="collapse-item {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard Efectivo</a>
                    <a class="collapse-item {{ Request::is('cashmovs*') ? 'active' : '' }}" href="{{ route('cashmovs.index') }}">Movimientos</a>
                    <a class="collapse-item {{ Request::is('cashcategories*') ? 'active' : '' }}" href="{{ route('cashcategories.index') }}">Categorías</a>
                </div>
            </div>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
<!-- End of Sidebar -->

@section('js')
    <script>
        document.getElementById().onClick=function(){

        }

    </script>

@endsection