<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}  ">
                <a class="nav-link" href="{{ url('admin/dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('category') ? 'active' : ''}} ">
                <a class="nav-link" href="{{ route('category.index')}}">
                    <i class="material-icons">person</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('product') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('product.index')}}">
                    <i class="material-icons">person</i>
                    <p>Products</p>
                </a>
            </li>
        </ul>
    </div>
</div>