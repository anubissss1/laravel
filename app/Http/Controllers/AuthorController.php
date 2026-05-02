<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Author;

class AuthorController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|string',
            'surname'=>'required|string',
            'birthdate'=>'required|date'
        ]);
    
        Author::create($validated);

        return redirect('/authores')->with('success','Author created successfully');
    }
}
