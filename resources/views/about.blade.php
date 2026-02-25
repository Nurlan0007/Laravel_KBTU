@extends('layouts.main')

@section('title', 'About Me')

@section('content')
    {{-- 1. This @php block creates the variable. Ensure there are no typos! --}}
    @php
        $skills = ['Laravel', 'PHP', 'Blade Templating', 'CSS'];
        $is_available = true;
    @endphp

    <h1>About Me</h1>
    <p>Welcome to my profile page! This page is built using Laravel Blade.</p>

    <h3>My Skills:</h3>
    <ul>
        {{-- 2. @foreach directive to loop through the data we just made --}}
        @foreach($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>

    {{-- 3. @if directive for conditional logic --}}
    @if($is_available)
        <p style="color: green;"><strong>Status:</strong> Currently available for projects.</p>
    @else
        <p style="color: red;"><strong>Status:</strong> Not currently available.</p>
    @endif

    <a href="#" class="btn">Contact Me</a>
@endsection
