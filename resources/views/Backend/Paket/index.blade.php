@extends('Backend.Layout.app')

@section('css')

@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Data Paket</h4>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-info mb-0" href="{{route('paket.create')}}" role="button" style="float: right">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="paket-datatable">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Harga Awal</th>
                    <th>Harga Jual</th>
                    <th>Best</th>
                    <th>Premium</th>
                    <th>Lihat Fitur</th>
                    <th>Aktivasi</th>
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
        $("#paket").addClass("active");
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
        var roletable = $('#paket-datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            "language": {
                "paginate": {
                "previous": "&lt",
                "next": "&gt"
                }
            },
            ajax: "{{ route('paket.serverside') }}",
            order: [
                [1, 'asc']
            ],
            columns: [
                // {data: 'checkbox',name: 'checkbox', searchable: false, orderable: false},
                {data: 'name',name: 'name'},
                {data: 'old_price',name: 'old_price'},
                {data: 'sell_price',name: 'sell_price'},
                {data: 'best',name: 'best'},
                {data: 'premium',name: 'premium'},
                {data: 'view',name: 'view'},
                {data: 'activation',name: 'activation'},
                {data: 'action',name: 'action'},
            ]
        });
    });
</script>

@endsection

