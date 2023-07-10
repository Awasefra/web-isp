<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakets = Paket::latest()->get();
        $title='paket';
        //$kategoris = Kategori::orderBy('id_kategori', 'asc')->paginate(10);
        return view('paket.index', compact('pakets','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'harga'     =>'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $pakets = Paket::create([
            'name_paket'     => $request->name, 
            'harga'     => $request->harga, 
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $pakets 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Pket',
            'data'    => $paket
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'harga'     => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $paket->update([
            'name_paket'     => $request->name, 
            'harga'     => $request->harga, 
            
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $paket
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Paket::where('id', $id)->delete();
        Customer::where('id_paket', $id)->update([
            'id_paket'=>'Paket Telah Dihapus'
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Paket Berhasil Dihapus!.',
        ]); 
    }
}
