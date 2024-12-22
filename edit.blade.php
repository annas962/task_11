@extends('adminlte::page') 
@section('title', 'form pengarang') 
@section('content_header')
 <h1>form pengarang</h1>
 <br/>

 @stop
 @section('content') {{-- Isi Konten form pengarang --}} 

@foreach($ar_pengarang as $p)
 <form action="{{ route('pengarang.update',$p->id) }}" method="POST">
    @csrf
    @method('put')
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
        <label>foto</label><input type="file" name="foto" class="form-control"/>
    </div>
</form>
@endforeach
    <a href="{{ route('pengarang.index') }}"  class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> back</i></a>
    <button type="submit" class="btn btn-primary">update</button>
 @stop
