<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\pengarang;
class pengarangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //dapatkan seluruh data pengarang dengan query builder
    $ar_pengarang = DB::table('pengarang')    
    ->select('pengarang.*',
    'pengarang.nama AS nama',
    'pengarang.email AS email',
    'pengarang.hp AS hp',
    'pengarang.foto AS foto')
    ->get();
             
    //arahkan ke halaman baru dengan menyertakan data pengarang(compact)
    //di resources/views/pengarang/index.blade.php
    return view('pengarang.index',compact('ar_pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pengarang.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
            'nia'=>'required|unique:pengarang|numeric',  
            'nama'=>'required|max:50',
            'email'=>'required|max:50|regex:/(.+)@(.+)\.(.+)/i', 
            'hp'=>'required|max:50',
            'foto'=>'required',
            
            ],
            [
            'nia.required'=>'nia Wajib di Isi', 
            'nia.unique'=>'nia Tidak Boleh Sama', 
            'nia.numeric'=>'Harus Berupa Angka', 
            'nama.required'=>'Nama Wajib di Isi',
            'email.required'=>'Email Wajib di Isi', 
            'email.regex'=>'Harus berformat email',
            'hp.required'=>'hp Wajib di Isi', 
            'alamat.required'=>'Alamat Wajib di Isi', 
            
            ],
                );
        
                //tangkap data
                DB::table('pengarang')->insert (
                    [
                'nia'=>$request->nia, 
                'nama'=>$request->nama, 
                'email'=>$request->email, 
                'hp'=>$request->hp, 
                'foto'=>$request->foto, 
               
                    ]
                    );
        
                    //aetelah input data, arahkan ke /pengarang
                    return redirect()->route('pengarang.index');
        
            }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ar_pengarang = DB::table('pengarang')
        ->select('pengarang.*',
    'pengarang.nama AS nama',
    'pengarang.email AS email',
    'pengarang.hp AS hp',
    'pengarang.foto AS foto')
        ->where('pengarang.id','=',$id)->get();
        return view('pengarang.show',compact('ar_pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = DB::table('pengarang')->where('id','=',$id)->get();

        return view('pengarang.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('pengarang')->where('id','=',$id)->update(
            [
        'nia'=>$request->nia, 
        'nama'=>$request->nama, 
        'email'=>$request->email, 
        'hp'=>$request->hp, 
        'foto'=>$request->foto, 
       
            ]
            );
            return redirect('/pengarang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
