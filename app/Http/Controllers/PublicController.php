<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Insertion;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home () {
       
        $insertions = Insertion::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('welcome', compact('insertions'));
    }

    public function indexCategory(Category $category) 
    {
        return view ('insertion.categoryIndex', compact('category'));
    }

    public function searchInsertions(Request $request){
        $insertions = Insertion::search($request->searched)->where('is_accepted', true)->paginate(9);

        return view('insertion.index', compact('insertions'));
    }

    public function setLanguage($lang){

        session()->put('locale', $lang);

        return redirect()->back();

    }
}

