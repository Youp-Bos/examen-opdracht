<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use App\Models\Menu;
use App\Models\resevering;
use Illuminate\Http\Request;

class BestellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bestellingen = Bestelling::all();

        return view('bestellingen.index', compact('bestellingen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bestellingen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request);
        $request->validate([
            'resevering_id'=>'required',
            'menuitem_code'=>'required',
            'catagory' => 'required',
            'hoeveelheid' => 'required',
            'prijs_menuitem' => 'required'
        ]);

        $bestelling = new Bestelling([
            'resevering_id' => $request->get('resevering_id'),
            'menuitem_code' => $request->get('menuitem_code'),
            'menuitem_catagory' => $request->get('catagory'),
            'hoeveelheid' => $request->get('hoeveelheid'),
            'prijs_menuitem' => $request->get('prijs_menuitem'),
        ]);
        $bestelling->save();
        return redirect('/bestelling')->with('success', 'Bestelling toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservationUser = resevering::where('id', $id)->get();
        $menuitems = Menu::all();
        return view('bestellingen.create', compact('reservationUser', 'menuitems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bestelling = Bestelling::find($id);
        return view('bestellingen.edit', compact('bestelling'));
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
            'product_code' => 'required',
            'gerechtcatagory_id' => 'required',
            'hoeveelheid' => 'required'
        ]);
        $bestelling = Bestelling::find($id);

        $bestelling->product_code = $request->get('product_code');
        $bestelling->gerechtcatagory_id = $request->get('gerechtcatagory_id');
        $bestelling->hoeveelheid = $request->get('hoeveelheid');
        $bestelling->save();

        return redirect('/bestelling')->with('success', 'Bestelling Bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bestelling = Bestelling::find($id);
        $bestelling->delete();

        return redirect('/bestelling')->with('success', 'Bestelling verwijdert.');
    }
}
