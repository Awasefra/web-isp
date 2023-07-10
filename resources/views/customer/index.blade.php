@extends('layouts.master')
    @section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Data Customer </h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-customer">TAMBAH</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                
                                    <th>Nama Customer</th>
                                    <th>Nama paket</th>
                                    <th>Alamat</th>
                                    <th>Harga</th>
                                    <th>foto_ktp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-customer">
                                @foreach($customers as $customer)
                                <tr id="index_{{ $customer->id }}">
                                    <td>{{ $customer->nama_customer }}</td>
                                    @if ($customer->id_paket=='Paket Telah Dihapus')
                                    <td>{{ $customer->id_paket }}</td>
                                    <td>{{ $customer->alamat }}</td>
                                    <td>{{ $customer->id_paket }}</td>
                                    @else
                                    <td>{{ $customer->paket->name_paket }}</td>
                                    <td>{{ $customer->alamat }}</td>
                                    
                                    <td>@currency($customer->paket->harga)</td>
                                    @endif
                                    
                                    
                                    <td>@if ($customer->foto_ktp=='belum ada')
                                        <a href="javascript:void(0)" id="btn-tambah-foto" data-id="{{ $customer->id }}" class="btn btn-success btn-sm">Tambah Foto</a>
                                       @else
                                       <a href="{{ url('img/foto_ktp').'/'. $customer->foto_ktp }}"> <img  style="max-height: 50px; max-widht:50px;" src="{{ url('img/foto_ktp').'/'. $customer->foto_ktp }}"></a>
                                    
                                    @endif</td>
                                    
                                    <td class="text-center">
                                        
                                        <a href="javascript:void(0)" id="btn-edit-customer" data-id="{{ $customer->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-customer" data-id="{{ $customer->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $kategoris->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
        @include('customer.create')
        @includeif('customer.edit')
        @include('customer.delete')
        @include('customer.insert_foto')

        
@endsection