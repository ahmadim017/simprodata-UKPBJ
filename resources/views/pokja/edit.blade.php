@extends('layouts.sbadmin')

@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Pokja</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
        
        <form enctype="multipart/form-data" action="{{route('pokja.update',[$pokja->id])}}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label for="name">Nama Pokja</label>
        <input class="form-control" placeholder="Group Pokja" type="text" name="namapokja" value="{{$pokja->namapokja}}"/>
        <br>
        <label for="">Status</label>
        <br>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="status" id="ACTIVE" value="ACTIVE" {{$pokja->status == "ACTIVE" ? "checked" : ""}}>
            <label for="form-radio-label" for="ACTIVE">ACTIVE</label>
        </div>
        <div class="form-radio form-radio-inline">
            <input type="radio" name="status" id="INACTIVE" value="INACTIVE" {{$pokja->status == "INACTIVE" ? "checked" : ""}}>
            <label for="form-radio-label" for="INACTIVE">INACTIVE</label>
        </div><br>
        <div class="row">
            <div class="col-6">
                <label for="">Tanggal Pembuatan</label>
            <input type="date" class="form-control" name="tglpembuatan" value="{{$pokja->tglpembuatan}}">
            </div> 
        </div>
          <br>
          <div class="breadcrumb col-8">
            Daftar Pegawai UKPBJ
        </div>
          <div class="row">
            <div class="col-8">
              @foreach ($datapokja as $dt)
              <select name="id_user[]" class="form-control">
                <option value=""></option>
                @foreach ($user as $u)
               
                <option @if ($dt == $u->id )  selected @endif value="{{$u->id}}">{{$u->name}}</option>
                
                @endforeach
              </select><br>
              @endforeach
            </div>
          </div>
          <br>
        <button class="btn btn-primary btn-sm" value="submit" type="submit"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-plus-circle fa-fw fa-sm"></i>Tambah Pokja</a>
        <a href="{{route('pokja.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
      </form>
<br> 
     
      </div>
    </div>
</div>
@endsection