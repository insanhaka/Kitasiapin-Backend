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
                    <h4>Ubah Data Paket</h4>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('paket.update', ['paket'=>$data->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" id="name"
                            name="name" placeholder="Nama Paket" value="{{ $data->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Harga Awal</label>
                            <input type="number" class="form-control" id="old-price" name="old_price" placeholder="xxxxxxx" style="padding-left: 10%" value="{{ $data->old_price }}">
                            <span class="field-icon1 toggle-password">Rp.</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Harga Jual</label>
                            <input type="number" class="form-control" id="sell-price" name="sell_price" placeholder="xxxxxxx" style="padding-left: 10%" value="{{ $data->sell_price }}">
                            <span class="field-icon1 toggle-password">Rp.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Best</label>
                            @php
                                $yes = '';
                                $no = '';
                                 if($data->best == 'yes'){
                                    $yes = 'checked';
                                 }else{
                                     $no = 'checked';
                                 }
                            @endphp
                            <select name="best" class="form-control" id="best">
                                <option value="no" {{$no}}>Tidak</option>
                                <option value="yes" {{$yes}}>Iya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Premium</label>
                            @php
                                $yes = '';
                                $no = '';
                                 if($data->best == 'yes'){
                                    $yes = 'checked';
                                 }else{
                                     $no = 'checked';
                                 }
                            @endphp
                            <select name="premium" class="form-control" id="premium">
                                <option value="no" {{$no}}>Tidak</option>
                                <option value="yes" {{$yes}}>Iya</option>
                            </select>
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

@endsection

