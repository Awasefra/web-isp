<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'laporan';
        
        $user = DB::table('customers')
        ->leftjoin('users', 'customers.id_sales', '=', 'users.id')
        ->leftjoin('pakets', 'customers.id_paket', '=', 'pakets.id')
        ->select('users.name',   DB::raw('SUM(pakets.harga) as total_sales'))
        ->groupBy('users.name')
        ->get();

        $customers = Customer::with('sales','paket')->orderby('id_sales')->get();
        
        return view('laporan.index', compact('user','title', 'customers'));
    }

    public function cetak_pdf_total()
    {
    	$user = DB::table('customers')
        ->leftjoin('users', 'customers.id_sales', '=', 'users.id')
        ->leftjoin('pakets', 'customers.id_paket', '=', 'pakets.id')
        ->select('users.name',   DB::raw('SUM(pakets.harga) as total_sales'))
        ->groupBy('users.name')
        ->get();
        
        $todayDate = Carbon::now()->format('Y-m-d-H-i');
        $Date = Carbon::now()->format('Y-m-d');
        $Time = Carbon::now()->format('H:i');

        $pdf = App::make('dompdf.wrapper');
    	$pdf = PDF::loadview('laporan.cetak_pdf_total',['user'=>$user, 'Time'=>$Time, 'Date'=>$Date]);
    	return $pdf->download('laporan-total-pengehasilan-'.$todayDate.'.pdf');
    }
    public function cetak_pdf_sales()
    {
        $customers = Customer::with('sales','paket')->orderby('id_sales')->get();
        
        $todayDate = Carbon::now()->format('Y-m-d-H-i');
        $Date = Carbon::now()->format('Y-m-d');
        $Time = Carbon::now()->format('H:i');

        $pdf = App::make('dompdf.wrapper');
    	$pdf = PDF::loadview('laporan.cetak_pdf_sales',['customers'=>$customers, 'Time'=>$Time, 'Date'=>$Date]);
    	return $pdf->download('laporan-rincian-penghasilan-'.$todayDate.'.pdf');
    }
    
}
