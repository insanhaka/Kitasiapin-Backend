<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
    Profile - Kitasiapin
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.5') }}" rel="stylesheet" />
    <style>
        .form-control:focus {
          border-color: #0fbcf9;
          box-shadow: 0 0 0 0.1rem #fff;
          }
        table td {
          font-size: 14px;
        }
        .table {
            font-size: 14px;
            width: 100% !important;
        }
        .table thead th {
            padding: 0;
            padding-bottom: 1%;
            padding-left: 1%;
        }
        .dataTables_scrollBody::-webkit-scrollbar {
            height: 10px !important;
            background-color: #ccc;
        }
        .dataTables_scrollBody::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }
        .dataTables_scrollBody::-webkit-scrollbar
        {
            width: 12px;
            background-color: #F5F5F5;
        }
        .dataTables_scrollBody::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #d2dae2;
        }
    </style>
    <style>
        .kv-file-zoom {
            visibility: hidden;
        }
        .kv-file-remove {
            visibility: hidden;
        }
        .close {
            visibility: hidden;
        }
        .btn-file {
            background-color: #0fbcf9;
        }
        .btn-file:hover {
            background-color: #0fbcf9;
        }
        .field-icon {
            float: right;
            margin-right: 10px;
            margin-top: -28px;
            position: relative;
            z-index: 2;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link href="{{ asset('assets/vendor/Krajee-file-input/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/Krajee-file-input/themes/explorer-fa/theme.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.css') }}">
</head>

<body class="g-sidenav-show  bg-gray-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img src="{{asset('assets/img/profile-edit-top.png')}}" class="img-fluid" alt="Responsive image">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 offset-md-3" style="padding-top: 2%;">
            <div class="row">
                <div class="col-md-6">
                    <h2>Edit Profile</h2>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            <br>

            <form method="POST" action="/profile/admin/{!!$data->id!!}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{!! $data->name !!}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{!! $data->username !!}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Alamat Email Aktif</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{!! $data->email !!}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" value="{{ old('password') }}" name="password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInput">Upload Photo profile</label>
                            <div class="file-loading">
                                <input id="input-b6" class="form-control" name="photo" type="file">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="float: right">
                    <div class="col-md-5">
                        <input class="btn btn-secondary" type="submit" value="Save">
                    </div>
                    <div class="col-md-5">
                        <a class="btn btn-info" href="/profile/admin/{{ $data->id }}" role="button">Back</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <img src="{{asset('assets/img/profile-edit-side.png')}}" height="300" alt="Responsive image">
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.5') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendor/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>

<script src="{{ asset('assets/vendor/Krajee-file-input/js/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/vendor/Krajee-file-input/themes/explorer-fa/theme.js') }}"></script>
<script src="{{ asset('assets/vendor/Krajee-file-input/themes/gly/theme.js') }}"></script>

<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

<script>
    $(document).ready(function() {
        $("#input-b6").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            maxFileCount: 10,
            initialPreview: [
                "{{Storage::url('profile-picture/'.$data->photo)}}"
            ],
            initialPreviewAsData: true,
            initialPreviewFileType: 'image',
        });
    });
</script>

<script type="text/javascript">
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    @if ($message = Session::get('success'))
        Toast.fire({
            icon: 'success',
            title: '{{$message}}'
        })
    @endif
    @if ($message = Session::get('error'))
        Toast.fire({
            icon: 'error',
            title: '{{$message}}'
        })
    @endif
</script>

</body>

</html>

