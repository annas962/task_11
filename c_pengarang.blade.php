@extends('adminlte::page') 
@section('title', 'form pengarang') 
@section('content_header')
 <h1>form pengarang</h1>
 <br/>

 @stop
 @section('content') {{-- Isi Konten form pengarang --}} 
 @if($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach($errors->all() as $error)
 <li>{{ $error }}</li> 
@endforeach
 </ul>
 </div>
 @endif

 <form action="{{ route('pengarang.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>nama</label><input type="text" name="nama" class="form-control"/>
    </div>
    <div class="form-group">
        <label>email</label><input type="text" name="email" class="form-control"/>
    </div>
    <div class="form-group">
        <label>hp</label><input type="text" name="hp" class="form-control"/>
    </div>
    <div class="form-group">
        <label>foto</label><input type="text" name="foto" class="form-control"/>
    </div>

    <a href="{{ route('pengarang.index') }}"  class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> back</i></a>
    <button type="submit" class="btn btn-primary">simpan</button>
 @stop
