<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
// We define the data here in the "Brain" of the app
$skills = ['Laravel', 'PHP', 'Blade Templating', 'Golang', 'Soft Skills','CPP'];
$is_available = true;

// Then we pass it to the view using the second argument
return view('about', compact('skills', 'is_available'));
});
