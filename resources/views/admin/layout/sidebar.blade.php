<style>
    .asdffd{
    background-color:#06B6D4FF !important;
    }
    .nicescroll-cursors{
    height: 0px !important;
    }
    .sidebar-mini .main-sidebar  {
    width: 60px !important; 
    position: fixed !important;    
    left: 0 !important;  
    }
    .sidebar-mini .main-sidebar .sidebar-menu>li {
    padding: 3px !important;
    }
    /*.main-sidebar{*/
    /*    position: sticky !important;*/
    /*    top: 0px;*/
    /*}*/
 </style>

<div class="main-sidebar sidebar-style-2 supreme-container">
    <aside id="sidebar-wrapper">
       <div class="sidebar-brand">
          <a href="">
             {{-- <img alt="image" src="https://iato.in/assets/images/logo-footer.png" class="header-logo" style="height:50px;"/> --}}
          <span class="logo-name ">
             {{-- <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> --}}
             Listing
          </span>
          </a>
       </div>
       <ul class="sidebar-menu">
          <li class="dropdown ">
             <a href="{{route('admin.index')}}" class="nav-link  asdffd"><i data-feather="monitor"></i><span>Dashboard</span></a> 
          </li>

          <li class="dropdown"><a class="nav-link" href=""><i data-feather="users"></i><span>Key Master</span></a></li>

          
          <li class="dropdown">
             <a href="#" class="menu-toggle nav-link has-dropdown  "><i
                data-feather="calendar"></i><span>Masters</span></a>
             <ul class="dropdown-menu" >
                <li><a class="nav-link " href="">Country</a></li>
                
             </ul>
          </li>

          <li class="dropdown">
             <a href="#" class="menu-toggle nav-link has-dropdown  "><i
                data-feather="globe"></i><span>Website Settings</span></a>
          </li>
             </ul>
          
          
       </ul>
    </aside>
 </div>
 
 