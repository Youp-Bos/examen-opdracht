<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuitems = Menu::all();

        return view('menu.index', compact('menuitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
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
            'code'=>'required',
            'naam'=>'required',
            'itemcatagory' => 'required',
            'prijs' => 'required'
        ]);

        $menuitems = new Menu([
            'code' => $request->get('code'),
            'naam' => $request->get('naam'),
            'itemcatagory' => $request->get('itemcatagory'),
            'prijs' => $request->get('prijs')
        ]);
        $menuitems->save();
        return redirect('/menu')->with('success', 'Menu item opgeslagen.');
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
        $menuitem = Menu::find($id);
        return view('menu.edit', compact('menuitem'));
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
            'code'=>'required',
            'naam'=>'required',
            'itemcatagory' => 'required',
            'prijs' => 'required'
        ]);
        $menuitem = Menu::find($id);
        // Getting values from the blade template form
        $menuitem->code =  $request->get('code');
        $menuitem->naam = $request->get('naam');
        $menuitem->itemcatagory = $request->get('itemcatagory');
        $menuitem->prijs = $request->get('prijs');
        $menuitem->save();

        return redirect('/menu')->with('success', 'Menu item is bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menuitem = Menu::find($id);
        $menuitem->delete();

        return redirect('/menu')->with('success', 'Menu item is verwijdert.');

    }
}
