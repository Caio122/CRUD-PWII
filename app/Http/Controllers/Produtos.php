<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class Produtos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::where('status', '=', true)->get();
        return view('produtos.index', compact(['produto']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produto = Produto::all();
        return view('produtos.create', compact('produto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->quantidade = $request->input('quantidade');
        $produto->save();
        return redirect()->route('produtos.index', compact('produto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::where('id', $id)->first();
        return view('produtos.show', compact(['produto']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        if (isset($produto)) {
            return view('produtos.edit', compact('produto'));
        }
        return view('produtos.index');
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
        $produto = Produto::find($id);
        if (isset($produto)) {
            $produto->nome = $request->input('nome');
            $produto->quantidade = $request->input('quantidade');
            $produto->save();
        }
        return redirect()->route('produtos.index', compact('produto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request, $id) {
        $produto = Produto::find($id);
        if (isset($produto)) {
            $produto->status = false;
            $produto->save();
        }
        return redirect()->route('produtos.index', compact('produto'));
    }
}




