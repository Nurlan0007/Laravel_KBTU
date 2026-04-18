<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthdate' => 'required|date',
        ]);

        Author::create($validatedData);

        return redirect('/authors')->with('success', 'Author created successfully!');
    }
}
