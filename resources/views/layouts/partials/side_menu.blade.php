<!-- Page Sidebar Start-->
<nav-menus></nav-menus>
<header class="main-nav">
  <nav>
    <div class="main-navbar">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="mainnav">
        <ul class="nav-menu custom-scrollbar">
          <li class="back-btn">
            <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="home"></i><span>Dashboard</span></a>
            <ul class="nav-submenu menu-content">
                {{-- <li><a href="{{ route('company_detail.create') }}">Add Company Details</a></li> --}}
               <li><a href="{{ route('home') }}">Company Profile</a></li>
                {{--  <li><a href="{{ route('company_days.index') }}">Company Working Days</a></li>  --}}
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Services</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('service.index') }}">All Services</a></li>
              <li><a href="{{ route('purpose_service.create') }}">Propose Service</a></li>
              <li><a href="{{ route('service_category.create') }}">Select Services</a></li>
              {{--  <li><a href="{{ route('service.create') }}">Purpose service</a></li>  --}}
              <!-- <li><a href="general-widget.html">Update Services</a></li> -->
            </ul>
          </li>
            {{--  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Categories</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('caregory.index') }}">All categories</a></li>
               <li><a href="{{ route('purpose_Category.create') }}">Purpose category</a></li>
               <li><a href="{{ route('service_category.create') }}">Select Services</a></li>
              <li><a href="{{ route('caregory.create') }}">Purpose Categories</a></li>
             <li><a href="select product.html">Add Products in Category </a></li>
              <li><a href="general-widget.html">Update category</a></li>
            </ul>
          </li>    --}}
          {{--  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Products</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('product.index') }}">All products</a></li>
              <li><a href="{{ route('product.create') }}">Add product</a></li>

              <!-- <li><a href="general-widget.html">Update product</a></li> -->
            </ul>
          </li>  --}}
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Deals</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('company_deals.index') }}">All deals</a></li>
              <li><a href="{{ route('company_deals.create') }}">Add deal</a></li>
              <!-- <li><a href="general-widget.html">Update deal</a></li> -->
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Employees</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('employee.index') }}">All Employees</a></li>
              <li><a href="{{ route('employee.create') }}">Add Employees</a></li>
              <!-- <li><a href="general-widget.html">Update deal</a></li> -->
            </ul>
          </li>
          <!-- <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Company Categories</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="general-widget.html">All Company Categories</a></li>
              <li><a href="general-widget.html">Add Company Categories</a></li>
              <li><a href="general-widget.html">Update Company Categories</a></li>
            </ul>
          </li> -->
          <!-- <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Services Category</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="general-widget.html">All services in category</a></li>
              <li><a href="general-widget.html">Add services in category</a></li>
              <li><a href="general-widget.html">Update services in category</a></li>
            </ul>
          </li> -->
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Header Image</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{ route('company_header.create') }}">Add image</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>
    <!-- Page Sidebar Ends-->
