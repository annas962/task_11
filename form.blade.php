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
 <form action="{{ route('pengarang.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Nama</label><input type="text" name="nama" class="form-control"/>

    </div>
    <div class="form-group">
        <label>Email</label><input type="email" name="email" class="form-control"/>
    </div>
    <div class="form-group">
        <label>hp</label><input type="text" name="hp" class="form-control"/>
    </div>

    <div class="form-group">
        <label>foto</label><input type="file" name="foto" class="form-control"/>
    </div>
    <a href="{{ route('pengarang.index') }}"  class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> back</i></a>
    <button type="submit" class="btn btn-primary">simpan</button>
   
 @stop
 @section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop
@section('footer')
            <div class="float-right d-none d-sm-block">
                <b>@</b> Who Am I
            </div>
            <strong>&copy; {{ date('Y') }} <a href="#">Software Development</a>.</strong> All rights reserved.
    @stop
