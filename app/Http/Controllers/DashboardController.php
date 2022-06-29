<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionSource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard/index', [
            'fromDate' => null,
            'toDate' => null,
            'total' => 0,
            'gajiKaryawan' => 0,
            'material' => 0,
            'pembayaranLainClient' => 0,
            'bebanPokok' => 0,
            'labaBruto' => 0,
            'penyusutan' => 0,
            'transportasi' => 0,
            'pemeliharaan' => 0,
            'dokumen' => 0,
            'listrikTelepon' => 0,
            'kantor' => 0,
            'pembayaranLain' => 0,
            'bebanUsaha' =>  0,
            'labaUsaha' => 0,
            'pph' => 0
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function search(Request $request)
    {

        $request->validate([
            'fromDate' => ['required', 'date', 'before:toDate'],
            'toDate' => ['required', 'date', 'after:fromDate'],
        ]); 
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $total = Transaction::where('transaction_type_id', 'like', 1)
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->sum('total');

        $gajiKaryawan = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'gaji karyawan') 
                ->sum('t.total');

        $material = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'pembelian material') 
                ->sum('t.total');

        $pembayaranLainCLient = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'pembayaran lainnya untuk client') 
                ->sum('t.total');

        $bebanPokok = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where(function($query) {
                    $query->where('ts.transaction_source_name', 'LIKE', 'pembelian material')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'gaji karyawan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pembayaran lainnya untuk client');
                })
                ->sum('t.total');

        $penyusutan = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'penyusutan') 
                ->sum('t.total');

        $transportasi = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'transportasi') 
                ->sum('t.total');

        $pemeliharaan = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'pemeliharaan') 
                ->sum('t.total');

        $dokumen = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'dokumen') 
                ->sum('t.total');

        $kantor = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'kantor') 
                ->sum('t.total');

        $listrikTelepon = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'listrik dan telepon') 
                ->sum('t.total');

        $pembayaranLain = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where('ts.transaction_source_name', 'LIKE', 'pembayaran lainnya') 
                ->sum('t.total');

        $bebanUsaha = DB::table('transactions as t')
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->whereBetween('date', [
                    $fromDate,
                    Carbon::parse($toDate)->endOfDay()
                ])
                ->where('transaction_type_id', 'like', 2)
                ->where(function($query) {
                    $query->where('ts.transaction_source_name', 'LIKE', 'penyusutan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'transportasi')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pemeliharaan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'dokumen')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'listrik dan telepon')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'kantor')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pembayaran lainnya');
                })
                ->sum('t.total');

        $labaBruto = $total - $bebanPokok;
        $labaUsaha = $labaBruto - $bebanUsaha;
        $pph = $labaUsaha * (50/100) * (22/100);

        return view('dashboard/index', [
            'fromDate' => Carbon::parse($fromDate)->format('d M Y') ,
            'toDate' => Carbon::parse($toDate)->format('d M Y'),
            'outcomes' => Transaction::latest()
                        ->where('transaction_type_id', 'like', 2)
                        ->whereBetween('date', [
                            $fromDate,
                            Carbon::parse($toDate)->endOfDay()
                        ])
                        ->with('transaction_sources')
                        ->paginate(10),
            'total' => $total,
            'gajiKaryawan' => $gajiKaryawan,
            'material' => $material,
            'pembayaranLainClient' => $pembayaranLainCLient,
            'bebanPokok' =>  $bebanPokok,
            'labaBruto' => $labaBruto,
            'penyusutan' => $penyusutan,
            'transportasi' => $transportasi,
            'pemeliharaan' => $pemeliharaan,
            'dokumen' => $dokumen,
            'listrikTelepon' => $listrikTelepon,
            'kantor' => $kantor,
            'pembayaranLain' => $pembayaranLain,
            'bebanUsaha' =>  $bebanUsaha,
            'labaUsaha' => $labaUsaha,
            'pph' => $pph
        ]);
    }

    public function chart()
    {

        $income = Transaction::select(DB::raw("CAST(SUM(total) as int) as totalMonth"))
                ->where('transaction_type_id', 'like', 1)
                ->GroupBy(DB::raw("MONTH(date)"))
                ->pluck('totalMonth');

        $bebanPokok = DB::table('transactions as t')
                ->select(DB::raw("CAST(SUM(total) as int) as bebanPokok"))
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->where('transaction_type_id', 'like', 2)
                ->where(function($query) {
                    $query->where('ts.transaction_source_name', 'LIKE', 'pembelian material')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'gaji karyawan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pembayaran lainnya untuk client');
                })
                ->GroupBy(DB::raw("MONTH(t.date)"))
                ->pluck('bebanPokok');

        $incomeCollection = $income->toArray();
        $bebanPokokCollection = $bebanPokok->toArray();

        $incomeMinBebanPokok = array_map(function ($x, $y) { return $y-$x; } , $bebanPokokCollection, $incomeCollection);
        $labaBruto     = array_combine(array_keys($incomeCollection), $incomeMinBebanPokok);

        $bebanUsaha = DB::table('transactions as t')        
                ->select(DB::raw("CAST(SUM(total) as int) as bebanUsaha"))
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->where('transaction_type_id', 'like', 2)
                ->where(function($query) {
                    $query->where('ts.transaction_source_name', 'LIKE', 'penyusutan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'transportasi')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pemeliharaan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'dokumen')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'listrik dan telepon')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'kantor')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pembayaran lainnya');
                })
                ->GroupBy(DB::raw("MONTH(t.date)"))
                ->pluck('bebanUsaha');

        $bebanUsahaCollection = $bebanUsaha->toArray();

        $labaBrutoMinBebanUsaha = array_map(function ($x, $y) { return $y-$x; } , $bebanUsahaCollection, $labaBruto);
        $labaUsaha     = array_combine(array_keys($labaBruto), $labaBrutoMinBebanUsaha);

        $pph = array_map(function ($x) { 
            return $x * (50/100) * (22/100); 
        } , $labaUsaha);

        $labaUsahaMinPph = array_map(function ($x, $y) { return $y-$x; } , $pph, $labaUsaha);
        $totalLaba     = array_combine(array_keys($labaUsaha), $labaUsahaMinPph);








        $incomeYear = Transaction::select(DB::raw("CAST(SUM(total) as int) as totalYear"))
                ->where('transaction_type_id', 'like', 1)
                ->GroupBy(DB::raw("YEAR(date)"))
                ->pluck('totalYear');

        $bebanPokokYear = DB::table('transactions as t')
                ->select(DB::raw("CAST(SUM(total) as int) as bebanPokokYear"))
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->where('transaction_type_id', 'like', 2)
                ->where(function($query) {
                    $query->where('ts.transaction_source_name', 'LIKE', 'pembelian material')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'gaji karyawan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pembayaran lainnya untuk client');
                })
                ->GroupBy(DB::raw("YEAR(t.date)"))
                ->pluck('bebanPokokYear');

        $incomeYearCollection = $incomeYear->toArray();
        $bebanPokokYearCollection = $bebanPokokYear->toArray();

        $incomeYearMinBebanPokokYear = array_map(function ($x, $y) { return $y-$x; } , $bebanPokokYearCollection, $incomeYearCollection);
        $labaBrutoYear     = array_combine(array_keys($incomeYearCollection), $incomeYearMinBebanPokokYear);

        $bebanUsahaYear = DB::table('transactions as t')        
                ->select(DB::raw("CAST(SUM(total) as int) as bebanUsahaYear"))
                ->join('transaction_sources as ts', 't.transaction_source_id', '=', 'ts.id')
                ->where('transaction_type_id', 'like', 2)
                ->where(function($query) {
                    $query->where('ts.transaction_source_name', 'LIKE', 'penyusutan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'transportasi')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pemeliharaan')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'dokumen')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'listrik dan telepon')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'kantor')
                            ->orWhere('ts.transaction_source_name', 'LIKE', 'pembayaran lainnya');
                })
                ->GroupBy(DB::raw("YEAR(t.date)"))
                ->pluck('bebanUsahaYear');

        $bebanUsahaYearCollection = $bebanUsahaYear->toArray();

        $labaBrutoYearMinBebanUsahaYear = array_map(function ($x, $y) { return $y-$x; } , $bebanUsahaYearCollection, $labaBrutoYear);
        $labaUsahaYear     = array_combine(array_keys($labaBrutoYear), $labaBrutoYearMinBebanUsahaYear);

        $pphYear = array_map(function ($x) { 
            return $x * (50/100) * (22/100); 
        } , $labaUsahaYear);

        $labaUsahaYearMinPphYear = array_map(function ($x, $y) { return $y-$x; } , $pphYear, $labaUsahaYear);
        $totalLabaYear     = array_combine(array_keys($labaUsahaYear), $labaUsahaYearMinPphYear);

        $totalMonth = Transaction::select(DB::raw("CAST(SUM(total) as int) as totalMonth"))
        ->where('transaction_type_id', 'like', 1)
        ->GroupBy(DB::raw("MONTH(date)"))
        ->pluck('totalMonth');

        // dd($totalMonth);

        $totalYear = Transaction::select(DB::raw("CAST(SUM(total) as int) as totalYear"))
        ->where('transaction_type_id', 'like', 1)
        ->GroupBy(DB::raw("YEAR(date)"))
        ->pluck('totalYear');

        $month = Transaction::select(DB::raw("MONTHNAME(date) as month"))
        ->where('transaction_type_id', 'like', 1)
        ->GroupBy(DB::raw("MONTHNAME(date)"))
        ->OrderBy(DB::raw("MONTH(date)"), 'ASC')
        ->pluck('month');

        $year = Transaction::select(DB::raw("YEAR(date) as year"))
        ->where('transaction_type_id', 'like', 1)
        ->GroupBy(DB::raw("YEAR(date)"))
        ->OrderBy(DB::raw("YEAR(date)"), 'ASC')
        ->pluck('year');

        return view('chart/index', compact('totalLaba', 'totalLabaYear', 'month', 'year'));

    }
}