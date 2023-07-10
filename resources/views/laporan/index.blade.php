@extends('layouts.master')
    @section('content')
    <div class="container" >
        <div class="tabs">
            <h3 class="active">Total Penghasilan</h3>
            <h3>Rincian Penghasilan</h3>
            
          </div>
          <div class="tab-content">
                <div class="active">
                    <h4 class="text-center">Total Penghasilan Sales </h4>
                    
                        <a href="{{'/laporan/cetak_pdf_total'}}" class="btn btn-success mb-2" id="btn-create-customer">Cetak Pdf</a>
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            
                                <th>Nama Sales</th>
                                <th>Penghasilan</th>
                                
                            </tr>
                        </thead>
                        <tbody id="table-customer">
                            @foreach($user as $users)
                            <tr>
                            
                                <td>{{ $users->name }}</td>
                                <td>@currency($users->total_sales)</td>
                                
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <h4 class="text-center">Rincian Penghasilan Sales </h4>
                    
                        <a href="{{'/laporan/cetak_pdf_sales'}}" class="btn btn-success mb-2" id="btn-create-customer">Cetak Pdf</a>
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            
                                <th>Nama Sales</th>
                                <th>Nama Customer</th>
                                <th>Paket Yang Dipakai</th>
                                <th>Penghasilan</th>
                                
                            </tr>
                        </thead>
                        <tbody id="table-customer">
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->sales->name }}</td>
                                <td>{{ $customer->nama_customer }}</td>
                                <td>{{ $customer->paket->name_paket }}</td>
                                <td>@currency($customer->paket->harga)</td>
                                
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </p>
                  </div>
                    
          </div>
    </div>
    
        {{-- @include('customer.create')
        @includeif('customer.edit')
        @include('customer.delete')
        @include('customer.insert_foto') --}}
<script>
    let tabs = document.querySelectorAll(".tabs h3");
    let tabContents = document.querySelectorAll(".tab-content div");
    tabs.forEach((tab, index) => {
    tab.addEventListener("click", () => {
        tabContents.forEach((content) => {
        content.classList.remove("active");
        });
        tabs.forEach((tab) => {
        tab.classList.remove("active");
        });
        tabContents[index].classList.add("active");
        tabs[index].classList.add("active");
    });
    });
</script>
@push('css')
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
@endpush
@endsection