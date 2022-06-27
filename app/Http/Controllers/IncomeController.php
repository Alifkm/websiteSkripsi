<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionSource;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('incomes.index', [
            'incomes' => Transaction::latest()->filter(request(['search']))->where('transaction_type_id', 'like', 1)->with('transaction_sources')->paginate(10)
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

        return view('incomes.create', [
            'sources' => TransactionSource::where('id', 'like', 1)->get()
        ]);
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
        $request->validate([
            'transaction_name' => 'required',
            'transaction_source_id' => 'required',
            'date' => 'required',
            'total' => ['numeric', 'required']
        ]); 

        Transaction::create([
            'transaction_name' => $request->transaction_name,
            'transaction_type_id' => 1,
            'transaction_source_id' => $request->transaction_source_id,
            'date' => $request->date,
            'total' => $request->total
        ]);

        return redirect('/income')->with('message', 'Income ' . $request['transaction_name'] . ' created successfully!');
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
        return view('incomes.edit', [
            'income' => Transaction::where('id', 'like', $id)->first(),
            'sources' => TransactionSource::where('id', 'like', 1)->get()
        ]);
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
        $request->validate([
            'transaction_name' => 'required',
            'transaction_source_id' => 'required',
            'date' => 'required',
            'total' => ['numeric', 'required']
        ]); 

        $income = Transaction::where('id', 'like', $id)->first();

        $income->update([
            'transaction_name' => $request->transaction_name,
            'transaction_type_id' => 1,
            'transaction_source_id' => $request->transaction_source_id,
            'date' => $request->date,
            'total' => $request->total
        ]);

        return redirect('/income')->with('message', 'Income ' . $request['transaction_name'] . ' updated successfully!');
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
        $income = Transaction::where('id', 'like', $id)->first();
        $income->delete();
        return redirect('/income')->with('message', 'Income ' . $income['transaction_name'] . ' deleted successfully!'); 
    }
}
