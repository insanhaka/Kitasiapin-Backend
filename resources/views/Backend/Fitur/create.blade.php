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
</style>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Tambah Data Fitur</h4>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('fitur.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" id="name"
                            name="name" placeholder="Nama fitur" value="{{old('name')}}">
                        </div>
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
        $("#fitur").addClass("active");
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

@endsection

