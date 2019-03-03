<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('styleWeb/img/logochico.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">Menú</li>
            <li class="active"><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-industry"></i> <span>Productos</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ (route('products.index')) }}">Listado de productos</a></li>
                    <li><a href="{{ route('products.create') }}">Agregar Productos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-book"></i> <span>Categorías</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('categories.index') }}">Listado de categorías</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>