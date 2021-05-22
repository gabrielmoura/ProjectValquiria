<li class="nav-item mT-30">
    <a class="sidebar-link {{(url()->current()==route('admin.index')or url()->current()==route('client.index'))?"active":null}}"
       href="{{route('redirDASH')}}">
        <span class=" icon-holder">
    <i class="c-blue-500 ti-home"></i>
    </span>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    @can('edit_product')
        <a class="sidebar-link {{ (strpos(Route::currentRouteName(), 'admin.products') == 0) ? 'active' : '' }}"
           href="{{route('admin.products.index')}}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-hand-open"></i>
        </span>
            <span class="title">Produtos</span>
        </a>
    @endcan
    @can('edit_category')
        <a class="sidebar-link {{ (strpos(Route::currentRouteName(), 'admin.categories') == 0) ? 'active' : '' }}"
           href="{{route('admin.categories.index')}}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
            <span class="title">Categorias</span>
        </a>
    @endcan
    @can('edit_user')
        <a class="sidebar-link {{ (strpos(Route::currentRouteName(), 'admin.users') == 0) ? 'active' : '' }}"
           href="{{route('admin.users.index')}}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
            <span class="title">Usuários</span>
        </a>
    @endcan
    @can('view_client')
        <a class="sidebar-link {{ (strpos(Route::currentRouteName(), 'admin.client') == 0) ? 'active' : '' }}"
           href="{{route('admin.client.index')}}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
            <span class="title">Clientes</span>
        </a>
    @endcan

    @can('view_analytic')
        <a class="sidebar-link {{(url()->current()==route('admin.products.index'))?"active":null}}"
           href="{{route('admin.categories.index')}}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
            <span class="title">Estatisticas</span>
        </a>
    @endcan

    @role('client')
    KKKKK
    @endrole


</li>
<li class="nav-item dropdown open"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i
                class="c-teal-500 ti-view-list-alt"></i> </span><span class="title">Multiple Levels</span> <span
            class="arrow"><i class="ti-angle-right"></i></span></a>
    <ul class="dropdown-menu" style="display: block;">
        <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Menu Item</span></a></li>
        <li class="nav-item dropdown"><a href="javascript:void(0);"><span>Menu Item</span> <span class="arrow"><i
                        class="ti-angle-right"></i></span></a>
            <ul class="dropdown-menu">
                <li><a href="javascript:void(0);">Menu Item</a></li>
                <li><a href="javascript:void(0);">Menu Item</a></li>
            </ul>
        </li>
    </ul>
</li>
