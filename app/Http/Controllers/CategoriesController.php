<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;



class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=categorie::orderby('created_at','DESC')->get();
          return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nom'=>'required|min:2|max:50|unique:categories'
            ]);
        $categories=new categorie();
        $categories->nom=$request->nom;
        $categories->save();
        flash ('La categorie est créée avec succès')->success();
        return back();
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
        
        $categorie=Categorie::findOrFail($id);
        return view ( 'categories.edit' ,compact('categorie'));
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
        $this->validate($request,[
            'nom'=>'required|min:2|max:50|unique:categories,nom,'.$id
            ]);
            $categories=categorie::findOrFail($id);
            $categories->nom=$request->nom;
            $categories->save();
            flash( 'La categorie est modifiée avec succès')->success();
         return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie=Categorie::findOrFail($id);
        $id=$id;
        $categorie->delete();
        flash( 'La categorie a été supprimer avec succès')->success();
         return redirect()->route('categories.index');
    }
}
 