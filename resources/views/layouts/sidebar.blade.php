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

            {{-- Audit Mutu --}}
            <li class="menu-label">Pendaftaran Mahasiswa</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon text-success"> <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="menu-title">Data Pendaftaran</div>
                </a>
                <ul>

                    <li> <a href="/mahasiswa/create"><i class="bi bi-person-check"></i>Pendaftaran Mahasiswa</a>
                    </li>
                    @role('admin')
                        <li> <a href="/mahasiswa"><i class="bi bi-person-check"></i>Data Mahasiswa</a>
                        </li>
                    @endrole

                </ul>
            </li>


            @role('admin')
                <li class="menu-label">Manajemen User</li>


                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon text-success"> <i class="bi bi-person-gear"></i>
                        </div>
                        <div class="menu-title ">Manajemen User</div>
                    </a>
                    <ul>
                        <li> <a href="/user"><i class="bi bi-people"></i>Daftar User</a>
                        </li>


                    </ul>
                </li>
            @endrole
        </ul>
        <!--end navigation-->
    </div>
</div>
