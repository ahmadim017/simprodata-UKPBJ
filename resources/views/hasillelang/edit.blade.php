@extends('layouts.sbadmin')

@section('header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript">
$('#tugas').select2({
      placeholder : 'Cari..',
      allowClear :true
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
  
        // Format mata uang.
        $( '#hargap' ).mask('000.000.000.000.000', {reverse: true});
        $( '#hargat' ).mask('000.000.000.000.000', {reverse: true});
  
    })
  </script>
@endsection

@section('content')
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Hasil Lelang</h6>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm p-3">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-6">
                        <label for="">No Hasil Lelang</label>
                        <input type="text" name="nohasil" value="{{$hasillelang->nohasil}}" placeholder="No Surat Hasil Lelang" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="">Tanggal Hasil Lelang</label>
                    <input type="date" name="nohasik" class="form-control" value="{{$hasillelang->tglhasil}}">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-10">
                        <label for="">Nama Paket</label>
                        <select name="id_tugas" id="tugas" class="form-control">
                            @foreach ($tugas as $t)
                                <option @if ($t->id == $hasillelang->id_tugas)
                                    
                                @endif value="{{$t->id}}">{{$t->usulan->namapaket}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                </form>
            </div>
        </div>
    </div>
@endsection