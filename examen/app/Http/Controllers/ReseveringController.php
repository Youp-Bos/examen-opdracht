<?php

namespace App\Http\Controllers;

use App\Models\Resevering;
use Illuminate\Http\Request;

class ReseveringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserveringen = Resevering::all();

        return view('reserveringen.index', compact('reserveringen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserveringen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'datum'=>'required',
            'tijd'=>'required',
            'tafel'=>'required',
            'naam'=>'required',
            'telefoonnummer'=>'required',
            'aantal'=>'required'
        ]);

        $reservering = new Resevering([
            'datum'=> $request->get('datum'),
            'tijd'=> $request->get('tijd'),
            'tafel'=> $request->get('tafel'),
            'naam'=> $request->get('naam'),
            'telefoonnummer'=> $request->get('telefoonnummer'),
            'aantal'=> $request->get('aantal'),
            'allergien' => $request->get('allergien'),
            'opmerkingen' => $request->get('opmerkingen'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $reservering->save();
        return redirect('/')->with('success', 'Resevering Genoteerd.');
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
        $reserveringen = Resevering::find($id);
        return view('reserveringen.edit', compact('reserveringen'));
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
        $request->validate([
            'status'=>'required'
        ]);
        $reservering = Resevering::find($id);
        $reservering->status = $request->get('status');
        $reservering->save();

        return redirect('/reservering')->with('success', 'Resevering bij gewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $reservering = Resevering::find($id);
        $reservering->delete();

        return redirect('/reservering')->with('success', 'Reservatie verwijdert.');
    }
}
