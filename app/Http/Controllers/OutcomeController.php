<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionSource;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('outcomes.index', [
            'outcomes' => Transaction::latest()->filter(request(['search']))->where('transaction_type_id', 'like', 2)->with('transaction_sources')->paginate(10)
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
        return view('outcomes.create', [
            'sources' => TransactionSource::whereBetween('id', [2, 11])->get()
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
            'transaction_type_id' => 2,
            'transaction_source_id' => $request->transaction_source_id,
            'date' => $request->date,
            'total' => $request->total
        ]);

        return redirect('/outcome')->with('message', 'Outcome ' . $request['transaction_name'] . ' created successfully!');
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
        return view('outcomes.edit', [
            'outcome' => Transaction::where('id', 'like', $id)->first(),
            'sources' => TransactionSource::whereBetween('id', [2, 11])->get()
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

        $outcome = Transaction::where('id', 'like', $id)->first();

        $outcome->update([
            'transaction_name' => $request->transaction_name,
            'transaction_type_id' => 2,
            'transaction_source_id' => $request->transaction_source_id,
            'date' => $request->date,
            'total' => $request->total
        ]);

        return redirect('/outcome')->with('message', 'outcome ' . $request['transaction_name'] . ' updated successfully!');
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
        $outcome = Transaction::where('id', 'like', $id)->first();
        $outcome->delete();
        return redirect('/outcome')->with('message', 'Outcome ' . $outcome['transaction_name'] . ' deleted successfully!'); 
    }
}
