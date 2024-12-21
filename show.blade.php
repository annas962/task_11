@extends('adminlte::page') 
@section('title', 'form mahasantri') 
@section('content_header')
 <h1>form mahasantri</h1>
 <br/>

 @stop
 @section('content') {{-- Isi Konten form mahasantri --}} 

@php
$rs1 = App\models\dosen::all();
$rs2 = App\models\jurusan::all();
$rs3 = App\models\matakuliah::all();
@endphp
@foreach($data as $d)
 <form action="{{ route('mahasantri.update',$d->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label>nama</label><input type="text" name="nama" valeu="{{ $d->isbn }}" class="form-control"/>
    </div>
    <div class="form-group">
        <label>nim</label><input type="text" name="nim" valeu="{{ $d->isbn }}" class="form-control"/>
    </div>
   
    <div class="form-group">
        <label>dosen</label>
        <select name="dosen_id" class="form-control">
        <option value="">-- Pilih dosen--</option>
            @foreach($rs1 as $dsn)
            @php
                $sel1 = ($dsn->id == $d->iddosen) ? 'selected' : ''; 
            @endphp
            <option value="{{ $dsn->id }}"{{ $sel1 }}>{{ $dsn->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>jurusan</label>
        <select name="jurusan_id" class="form-control">
        <option value="">-- Pilih jurusan--</option>
            @foreach($rs2 as $jrs)
            @php
                $sel2 = ($jrs->id == $d->idjurusan) ? 'selected' : ''; 
            @endphp
            <option value="{{ $jrs->id }}"{{ $sel2 }}>{{ $jrs->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>matakuliah</label>
        <select name="matakuliah_id" class="form-control">
        <option value="">-- Pilih matakuliah--</option>
            @foreach($rs3 as $mk)
            @php
                $sel3 = ($mk->id == $d->idmatakuliah) ? 'selected' : ''; 
            @endphp
            <option value="{{ $mk->id }}" {{ $sel3 }}>{{ $mk->nama }}</option>
            @endforeach
        </select>
    </div>
</form>
@endforeach
    <a href="{{ route('mahasantri.index') }}"  class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> back</i></a>
    
 @stop
 @section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop