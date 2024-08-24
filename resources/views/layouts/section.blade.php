@extends('layouts.main')
@section('section')

    <body>
        <!-- Include the navbar -->
        @include('layouts.sidebar')

        <!-- Include the navbar -->
        @include('layouts.navbar')

        <!-- Content of the page -->
        @yield('content')

        <!--start overlay-->
        <div class="wrapper">
            <div class="overlay toggle-btn-mobile"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <!--footer -->
            <div class="footer">
                <p class="mb-0">&copy;2024 | Developed By : <a href="#" target="_blank" style="color: blue;">POLITEKNIK
                        NEGERI JAKARTA</a>
                </p>
            </div>
            <!-- end footer -->
        </div>
        <!-- end wrapper -->
        <!--start switcher-->
        <div class="switcher-wrapper">
            <div class="switcher-btn bg-success"> <i class='bx bx-cog bx-spin'></i>
            </div>
            <div class="switcher-body">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <hr />
                <h6 class="mb-0">Theme Styles</h6>
                <hr />
                <div class="d-flex align-items-center justify-content-between">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="darkmode">Dark Mode</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
                        <label class="custom-control-label" for="lightmode">Light Mode</label>
                    </div>
                </div>
                <hr />
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="DarkSidebar">
                    <label class="custom-control-label" for="DarkSidebar">Dark Sidebar</label>
                </div>
                <hr />
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="ColorLessIcons">
                    <label class="custom-control-label" for="ColorLessIcons">Color Less Icons</label>
                </div>
            </div>
        </div>
        <!--end switcher-->



        <!-- JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="{{ asset('../assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('../assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('../assets/js/bootstrap.min.js') }}"></script>

        <!--Select2-->
        <script src="{{ asset('../assets/plugins/select2/js/select2.min.js') }}"></script>
        <script>
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        </script>

        <!--plugins-->
        <script src="{{ asset('../assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('../assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
        <!--Data Tables js-->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <!-- Buttons Extension JS -->
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.flash.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
        <!-- JSZip and PDFMake for Excel and PDF Export -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


        <script src="{{ asset('../assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('../assets/js/index.js') }}"></script>
        <!-- Data Tables Example -->
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    order: [
                        [0, 'asc']
                    ],
                    scrollX: true,
                    dom: 'Bfrtip', // Untuk menambahkan tombol di bagian atas tabel
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                    ]
                });
            });
        </script>
        <!-- App JS -->
        <script src="{{ asset('../assets/js/app.js') }}"></script>
        <script>
            $(document).ready(function() {
                // Initialize PerfectScrollbar after elements are loaded
                if (document.querySelector('.dashboard-social-list')) {
                    new PerfectScrollbar('.dashboard-social-list');
                }
                if (document.querySelector('.dashboard-top-countries')) {
                    new PerfectScrollbar('.dashboard-top-countries');
                }
                if (document.querySelector('.header-notifications-list')) {
                    new PerfectScrollbar('.header-notifications-list');
                }
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

        <!-- Example using SweetAlert2 for notifications -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        @if ($message = Session::get('failed'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: '{{ $message }}',
                    showConfirmButton: true,
                    timer: null
                });
            </script>
        @endif

        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif
    </body>
@endsection
