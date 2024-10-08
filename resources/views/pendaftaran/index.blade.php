@extends('layouts.section')

@section('content')
    <!-- wrapper -->
    <div class="wrapper">
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <!-- Isi breadcrumb -->
                    </div>
                    <!--end breadcrumb-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <!-- Isi judul card -->
                                <h4 class="text-center my-4">Daftar Mahasiswa Baru</h4>
                            </div>
                            <hr />

                            <div class="table-responsive">
                                <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered text-center"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">Peringkat</th>
                                                <th scope="col">Nama Lengkap</th>
                                                <th scope="col">Alamat KTP</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Nilai Matematika</th>
                                                <th scope="col">Nilai Bahasa Indonesia</th>
                                                <th scope="col">Nilai Bahasa Inggris</th>
                                                <th scope="col">Rata-rata Nilai</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->nama_lengkap }}
                                                    </td>
                                                    <td>{{ $user->alamat_ktp }}
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    </td>
                                                    <td>{{ $user->nilai_mtk }}</td>
                                                    <td>{{ $user->nilai_bindo }}</td>
                                                    <td>{{ $user->nilai_bing }}</td>
                                                    <td>{{ $user->nilai_rata }}</td>

                                                    <td>
                                                        <a href="/pendaftaran/{{ $user->id }}/edit"
                                                            class="btn btn-warning btn-sm"><i class="bi bi-brush"></i></a>

                                                        <button class="btn btn-danger btn-sm h-full  border-0"
                                                            onclick="deleteUser({{ $user->id }})"><i
                                                                class="bi bi-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9">
                                                        <div class="alert alert-danger">Data Pengguna tidak tersedia.</div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end page-wrapper-->
    </div>
    <!-- end wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus user ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let userToDelete = null;

        function deleteUser(user) {
            userToDelete = user;
            $('#deleteUserModal').modal('show');
        }

        document.getElementById('confirmDelete').addEventListener('click', function() {
            if (userToDelete) {
                fetch(`/user/${userToDelete}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        $('#deleteUserModal').modal('hide');
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: data.success,
                                timer: 1400,
                                showConfirmButton: false
                            });
                            // Refresh halaman setelah berhasil menghapus User
                            location.reload();
                        } else {
                            throw new Error(data.error || 'Terjadi kesalahan.');
                        }
                    })
                    .catch(error => {
                        $('#deleteUserModal').modal('hide');
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: error.message || 'Anda tidak bisa menghapus user ini!',
                            timer: 1400,
                            showConfirmButton: false
                        });
                        console.error('There was an error!', error);
                    });
            }
        });
    </script>
@endsection
