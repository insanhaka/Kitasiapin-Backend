@extends('Super_Admin.Layout.app')

@section('css')
<style>
    .table {
        font-size: 14px;
        width: 100% !important;
    }
    .table thead th {
        padding: 0;
        padding-bottom: 2%;
        padding-left: 1%;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Data Basic Feature</h4>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-info mb-0" href="{{route('basic-feature.create')}}" role="button" style="float: right">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="basic-feature-datatable">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Description</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Activation</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    {{-- Serverside Handle --}}

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $(document).ready(function() {
        $("#basic-feature").addClass("active");
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
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var roletable = $('#basic-feature-datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            "language": {
                "paginate": {
                "previous": "&lt",
                "next": "&gt"
                }
            },
            ajax: "{{ route('basic-feature.serverside') }}",
            order: [
                [1, 'asc']
            ],
            columns: [
                // {data: 'checkbox',name: 'checkbox', searchable: false, orderable: false},
                {data: 'name',name: 'name'},
                {data: 'description',name: 'description'},
                {data: 'icon',name: 'icon'},
                {data: 'activation',name: 'activation'},
                {data: 'action',name: 'action'},
            ]
        });
    });
</script>

@endsection
