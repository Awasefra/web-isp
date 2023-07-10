@extends('layouts.master')
    @section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">DATA SALES </h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-sales">TAMBAH</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-sales">
                                @foreach($saless as $sales)
                                <tr id="index_{{ $sales->id }}">
                                    <td>{{ $sales->username }}</td>
                                    <td>{{$sales->name}}</td>
                                    <td class="text-center">
                                        
                                        <a href="javascript:void(0)" id="btn-delete-sales" data-id="{{ $sales->id }}" class="btn btn-danger btn-sm">DELETE</a>
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
        @include('sales.create')
        @include('sales.delete') 

        
@endsection