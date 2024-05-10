<?php

namespace App\Http\Controllers;

use App\Models\Insertion;
use Illuminate\Http\Request;

class InsertionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){
        $insertions = Insertion::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(9);
        return view('insertion.index', compact('insertions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('insertion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Insertion $insertion)
    {
        return view('insertion.show', compact('insertion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insertion $insertion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insertion $insertion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insertion $insertion)
    {
        //
    }
}
