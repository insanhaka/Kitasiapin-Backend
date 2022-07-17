@extends('Backend.Layout.app')

@section('css')

@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Data Tema Undangan</h4>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-info mb-0" href="{{route('tema-undangan.create')}}" role="button" style="float: right">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="tema-undangan-datatable">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Code</th>
                    <th>Thumbnail</th>
                    <th>Activation</th>
                    <th>Action</th>
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
        $("#tema-undangan").addClass("active");
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
        var roletable = $('#tema-undangan-datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            "language": {
                "paginate": {
                "previous": "&lt",
                "next": "&gt"
                }
            },
            ajax: "{{ route('tema-undangan.serverside') }}",
            order: [
                [1, 'asc']
            ],
            columns: [
                // {data: 'checkbox',name: 'checkbox', searchable: false, orderable: false},
                {data: 'name',name: 'name'},
                {data: 'code',name: 'code'},
                {data: 'thumbnail',name: 'thumbnail'},
                {data: 'activation',name: 'activation'},
                {data: 'action',name: 'action'},
            ]
        });
    });
</script>

@endsection

