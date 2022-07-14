@extends('Backend.Layout.app')

@section('css')
<style>
    .field-icon1 {
      float: left;
      margin-left: 15px;
      margin-top: -33px;
      position: relative;
      z-index: 2;
    }
    .field-icon2 {
      float: right;
      margin-right: 30px;
      margin-top: -28px;
      position: relative;
      z-index: 2;
    }
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
                    <h4>Data fitur pada paket {!! $data->name !!}</h4>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('paket.fitur', ['id'=>$data->id]) }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped" id="pafit-datatable">
                            <thead>
                              <tr>
                                <th scope="col">Nama Fitur</th>
                                <th scope="col">Pilih</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($features as $fitur)
                                <tr>
                                    <td>{!! $fitur->name !!}</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="create" name="fitur[]" value="{{$fitur->id}}" @if ($data->features->contains('id',$fitur->id)) checked @endif>
                                            {{-- <label>all</label> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info" style="float: right"> Simpan </button>
                    </div>
                </div>

            </form>
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

    @if ($message = Session::get('error'))
        Toast.fire({
            icon: 'error',
            title: '{{$message}}'
        })
    @endif
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var roletable = $('#pafit-datatable').DataTable({
            processing: true,
            scrollX: true,
            "searching": false,
            "dom": 'rtip',
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>

@endsection

