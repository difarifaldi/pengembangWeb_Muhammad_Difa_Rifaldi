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

                    <li> <a href="/audit"><i class="bi bi-person-check"></i>Pendaftaran Mahasiswa</a>
                    </li>
                    <li class="border-top">
                        <a href="/instrument"><i class="bi bi-pencil-square"></i>Ketercapaian Standar
                            @if (Auth::user()->hasRole('admin|superadmin|auditee'))
                                {{-- Tidak ada span --}}
                            @else
                                @php
                                    $userId = Auth::id();

                                    $instrumentCount = 0;
                                    if (Auth::user()->hasRole('auditor')) {
                                        $auditMutuIds = App\Models\AuditMutuInternal::where(
                                            'status_audit',
                                            '=',
                                            'belum selesai',
                                        )
                                            ->where('id_user_auditor_ketua', $userId)
                                            ->orWhere('id_user_auditor_anggota1', $userId)
                                            ->orWhere('id_user_auditor_anggota2', $userId)
                                            ->pluck('id')
                                            ->toArray();
                                        $instrumentCount = App\Models\InstrumenAudit::whereIn('id_AMI', $auditMutuIds)
                                            ->whereNull('id_status_temuan')
                                            ->whereNotNull('id_status_tercapai')
                                            ->count();
                                    } elseif (Auth::user()->hasRole('manajemen')) {
                                        $auditMutuIds = App\Models\AuditMutuInternal::where(
                                            'id_user_manajemen',
                                            $userId,
                                        )
                                            ->where('status_audit', '=', 'belum selesai')
                                            ->pluck('id')
                                            ->toArray();
                                        $instrumentCount = App\Models\InstrumenAudit::whereIn('id_AMI', $auditMutuIds)
                                            ->whereNotNull('id_status_temuan')
                                            ->whereNotNull('id_status_tercapai')
                                            ->whereNull('id_status_akhir')
                                            ->count();
                                    }
                                @endphp
                                @if ($instrumentCount > 0)
                                    <span
                                        class="rounded bg-success badge text-white mb-3 ml-1">{{ $instrumentCount }}</span>
                                @endif
                            @endif
                        </a>
                    </li>
                    @role('admin')
                        <li class="border-top"> <a href="/riwayat"><i class="bi bi-calendar4-week"></i>Riwayat Audit</a>
                        </li>
                    @endrole

                </ul>
            </li>

            {{-- Status Audit --}}
            @hasanyrole('manajemen|admin|auditor')
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon text-success"> <i class="bx bx-shape-circle"></i>
                        </div>
                        <div class="menu-title ">Status Audit</div>
                    </a>
                    <ul>
                        <li> <a href="/statusAudit"><i class="bx bx-filter"></i>Daftar Status</a>
                        </li>


                    </ul>
                </li>

                {{-- History --}}
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon text-success"> <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="menu-title ">LHA Audit</div>
                    </a>
                    <ul>
                        <li> <a href="/lha"><i class="bi bi-file-post"></i>Daftar LHA Audit</a>
                        </li>
                    </ul>
                </li>
            @endhasanyrole

            @role('admin')
                <li class="menu-label">Pengaturan</li>

                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon text-success"> <i class="bi bi-backpack4"></i>
                        </div>
                        <div class="menu-title ">Indikator</div>
                    </a>
                    <ul>
                        <li> <a href="/pernyataan"><i class="bi bi-card-checklist"></i>Daftar Pernyataan</a>
                        </li>
                        <li class="border-top"> <a href="/indikator"><i class="bi bi-calendar4-week"></i>Daftar
                                Indikator</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon text-success"> <i class="bi bi-building-gear"></i>
                        </div>
                        <div class="menu-title ">Unit</div>
                    </a>
                    <ul>
                        <li> <a href="/unit"><i class="bi bi-list-stars"></i>Daftar Unit</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon text-success"> <i class="bi bi-person-gear"></i>
                        </div>
                        <div class="menu-title ">User Management</div>
                    </a>
                    <ul>
                        <li> <a href="/admin"><i class="bi bi-people"></i>Daftar Pengguna</a>
                        </li>
                        <li> <a href="/aktivitas"><i class="bi bi-clock-history"></i>Aktivitas Pengguna</a>
                        </li>


                    </ul>
                </li>
            @endrole
        </ul>
        <!--end navigation-->
    </div>
</div>
