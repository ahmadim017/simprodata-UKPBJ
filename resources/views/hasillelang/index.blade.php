@extends('layouts.sbadmin')

@section('header')
<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('footer')
<script src="{{asset('public/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/sbadmin/js/demo/datatables-demo.js')}}"></script>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12 text-right">
    <a href="{{route('hasillelang.create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle fa-fw fa-sm"></i>Buat Hasil Lelang</a>
    </div> 
</div><br>

  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Data Hasil Lelang UKPBJ</h6>
    </a>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
      <div class="card-body">

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 
  
    @if(session('Status'))
      <div class="alert alert-danger">
      {{session('Status')}}
    </div>
    @endif
    <div class="table-responsive">  
<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">No Hasil Lelang</th>
        <th scope="col">Tanggal Hasil Lelang</th>
        <th scope="col">Nama Pekerjaan</th>
        <th scope="col">Sumber Dana</th>
        <th scope="col">Tahun Anggaran</th>
        @if (Auth::user()->roles == "ADMIN")
        <th scope="col">Aksi</th>
        @endif
      </tr>
    </thead>
    <tbody>
       @foreach ($hasillelang as $hl)
       <tr>
       <td>{{$loop->iteration}}</td>
       <td><a href="{{route('hasillelang.show',[$hl->id])}}">{{$hl->nohasil}}</a></td>
       <td>{{Date::createFromDate($hl->tglhasil)->format('j F Y')}}</td>
          <td>
          {{$hl->tugas->usulan->namapaket}}
          </td>
          <td>
            {{$hl->tugas->usulan->sumberdana}}
          </td>
          <td>
            {{$hl->tugas->usulan->ta}}
        </td>
        @if (Auth::user()->roles == "ADMIN")
      <td><a href="{{route('hasillelang.edit',[$hl->id])}}" class="btn btn-primary btn-sm">Edit</a> 
      <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?')" action="{{route('hasillelang.destroy',[$hl->id])}}" class="d-inline" method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="submit" value="Delete" class="btn btn-danger btn-sm">
          </form>
          </form>
          </td>
          @endif
    </tr> 
       @endforeach
        
       
      
      
    </tbody>
  </table>
    </div>
</div>
</div>
</div>
@endsection