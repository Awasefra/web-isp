<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::where('id_sales', auth()->user()->id)->with('sales','paket')->get();
        
        $paket = Paket::latest()->get();
        $title='customer';
        //$kategoris = Kategori::orderBy('id_kategori', 'asc')->paginate(10);
        return view('customer.index', compact('customers','title', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'paket'     =>'required',
            'alamat'      => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('img/foto_ktp'), $fileName);
            // if ($emp->avatar) {
            //     Storage::delete('public/images/' . $emp->foto);
            // }
        } else {
            $fileName = 'belum ada';
        }
 
        
        //create post
        Customer::create([
            'id_sales'      =>  auth()->user()->id,
            'nama_customer' =>  $request->name,
            'alamat'        =>  $request->alamat, 
            'id_paket'      =>  $request->paket,
            'foto_ktp'      =>  $fileName
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $customer  
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function insert_foto(Request $request){
        $fileName   = '';
        $id         = $request->id;
        
        if ($request->hasFile('foto')) {
            $file       = $request->file('foto');
            $fileName   = time() . '.' . $file->extension();
            $file->move(public_path('img/foto_ktp'), $fileName);
            // if ($emp->avatar) {
            //     Storage::delete('public/images/' . $emp->foto);
            // }
        } else {
            $fileName = 'belum ada';
        }
 
        
        Customer::where('id',$id)->update([
                'foto_ktp' => $fileName
                ]);
        
        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // if ($request->foto) {
        //     # code...
        // }
        $id         = $request->id;
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'id_paket'    => 'required',
            'alamat'    => 'required',
           
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if ($request->foto=='') {
            //create post
            Customer::where('id',$id)->update([
                'nama_customer'     => $request->name,
                'id_paket'          => $request->id_paket,
                'alamat'            => $request->alamat,
               
                
            ]);
        }
        else{
             
            File::delete('img/foto_ktp/'.$request->foto_lama);
             if ($request->hasFile('foto')) {
            $file       = $request->file('foto');
            $fileName   = time() . '.' . $file->extension();
            $file->move(public_path('img/foto_ktp'), $fileName);
           
        } 
        //create post
        Customer::where('id',$id)->update([
            'nama_customer'     => $request->name,
            'id_paket'          => $request->id_paket, 
            'alamat'            => $request->alamat,
            'foto_ktp'          => $fileName,
            
        ]);
        }
       

        //return response
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Customer::find($id);
        File::delete('img/foto_ktp/'.$image->foto_ktp);
        Customer::where('id', $id)->delete();
        
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Customer Berhasil Dihapus!.',
        ]); 
    
    }
}
