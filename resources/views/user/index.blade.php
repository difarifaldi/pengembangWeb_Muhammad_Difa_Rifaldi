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
                    <div class="card  radius-15">
                        <div class="card-body">
                            <div class="card-title">
                                <!-- Isi judul card -->
                                <h4 class="text-center my-4">Daftar User</h4>
                            </div>
                            <hr />

                            <a href="/user/create" class="btn btn-md btn-success mb-3 ml-3">User Baru</a>

                            <div class="table-responsive">
                                <div class="card-body">
                                    <table id="example" class="table  text-center" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>
                                                        <a href="/user/{{ $user->id }}/edit"
                                                            class="btn btn-warning btn-sm"><i class="bi bi-brush"></i></a>

                                                        <button class="btn btn-danger btn-sm h-full  border-0"
                                                            onclick="deleteUser({{ $user->id }})"><i
                                                                class="bi bi-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="alert alert-danger">Data User tidak tersedia.</div>
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
