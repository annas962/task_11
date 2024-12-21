@extends('adminlte::page') 
@section('title', 'form mahasantri') 
@section('content_header')
 <h1>form mahasantri</h1>
 <br/>

 @stop
 @section('content') {{-- Isi Konten form mahasantri --}} 
 @if($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach($errors->all() as $error)
 <li>{{ $error }}</li> 
@endforeach
 </ul>
 </div>
 @endif

@php
$rs1 = App\models\dosen::all();
$rs2 = App\models\jurusan::all();
$rs3 = App\models\matakuliah::all();
@endphp

 <form action="{{ route('mahasantri.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>nama</label><input type="text" name="nama" class="form-control"/>
    </div>
    <div class="form-group">
        <label>nim</label><input type="text" name="nim" class="form-control"/>
    </div>
    
    
    <div class="form-group">
        <label>dosen</label>
        <select name="dosen_id" class="form-control">
        <option value="">-- Pilih dosen--</option>
            @foreach($rs1 as $dsn)
            <option value="{{ $dsn->id }}">{{ $dsn->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>jurusan</label>
        <select name="jurusan_id" class="form-control">
        <option value="">-- Pilih jurusan--</option>
            @foreach($rs2 as $jrs)
            <option value="{{ $jrs->id }}">{{ $jrs->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>matakuliah</label>
        <select name="matakuliah_id" class="form-control">
        <option value="">-- Pilih matakuliah--</option>
            @foreach($rs3 as $mk)
            <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('mahasantri.index') }}"  class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> back</i></a>
    <button type="submit" class="btn btn-primary">simpan</button>
 @stop
