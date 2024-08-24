 <!-- wrapper -->
 <div class="wrapper">
     <!--header-->
     <header class="top-header">
         <nav class="navbar navbar-expand">
             <div class="left-topbar d-flex align-items-center">
                 <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
                 </a>
             </div>
             <div class="right-topbar ml-auto">
                 <ul class="navbar-nav">

                     {{-- Akun dropdown --}}
                     <li class="nav-item dropdown dropdown-user-profile">
                         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                             data-toggle="dropdown">
                             <div class="media user-box align-items-center">
                                 <div class="media-body user-info">
                                     <p class="user-name mb-0">
                                         {{ Auth::user()->username ? Auth::user()->username : 'Data Nama tidak ditemukan' }}

                                     </p>
                                     <p class="designattion mb-0 text-success">
                                         {{ Auth::user()->roles->first() ? Auth::user()->roles->first()->name : 'Data Role tidak ditemukan' }}
                                     </p>

                                 </div>
                                 <i class="fas fa-user-circle fa-fw"></i>

                                 @if (Auth::user()->foto)
                                     <img src="{{ asset('/storage/' . Auth::user()->foto) }}" class="user-img"
                                         alt="user avatar">
                                 @else
                                     <img src="{{ asset('../assets/images/user.png') }}" class="user-img"
                                         alt="user avatar">
                                 @endif
                             </div>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" href="{{ route('logout') }}">
                                 <i class="bi bi-power text-red"></i>
                                 <span>Logout</span>
                             </a>
                         </div>
                     </li>

                 </ul>
             </div>
         </nav>
     </header>
 </div>
 <!-- end wrapper -->
