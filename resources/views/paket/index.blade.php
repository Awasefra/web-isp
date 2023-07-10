@extends('layouts.master')
    @section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">PAKET INTERNET </h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-paket">TAMBAH</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-paket">
                                @foreach($pakets as $paket)
                                <tr id="index_{{ $paket->id }}">
                                    <td>{{ $paket->name_paket }}</td>
                                    <td>@currency($paket->harga)</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-paket" data-id="{{ $paket->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-paket" data-id="{{ $paket->id }}" class="btn btn-danger btn-sm">DELETE</a>
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
        @include('paket.create')
        @include('paket.edit')
        @include('paket.delete')

        
@endsection