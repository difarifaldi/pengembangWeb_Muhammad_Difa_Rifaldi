<!-- wrapper -->
<div class="wrapper">
    <!--sidebar-wrapper-->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div class="">
                <a href="/"><img src="{{ asset('../assets/images/PNJ.png') }}" class="logo-icon-2"
                        alt="" /></a>
            </div>
            <div>
                <h4 class="logo-text"><a href="/" style="color: green;">SIMABA</a></h4>
            </div>
            <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">

            <li>
                <a href="/">
                    <div class="parent-icon text-success"><i class="bx bx-home-alt"></i>
                    </div>
                    <div class="menu-title">Home</div>
                </a>
            </li>

            <li class="menu-label">Pendaftaran Mahasiswa</li>
            @role('mahasiswa')
                <li>
                    <a href="/pendaftaran/{{ Auth::user()->id }}/edit">
                        <div class="parent-icon text-success"><i class="bi bi-person-add"></i>
                        </div>
                        <div class="menu-title">Pendaftaran Mahasiswa</div>
                    </a>
                </li>
            @endhasrole
            @role('admin')
                <li>
                    <a href="/pendaftaran">
                        <div class="parent-icon text-success"><i class="bi bi-person-workspace"></i>
                        </div>
                        <div class="menu-title">Data Mahasiswa</div>
                    </a>
                </li>
            @endhasrole



            @role('admin')
                <li class="menu-label">Manajemen User</li>
                <li>
                    <a href="/user">
                        <div class="parent-icon text-success"><i class="bi bi-person-gear"></i>
                        </div>
                        <div class="menu-title">Manajemen User</div>
                    </a>
                </li>
            @endrole
        </ul>
        <!--end navigation-->
    </div>
</div>
