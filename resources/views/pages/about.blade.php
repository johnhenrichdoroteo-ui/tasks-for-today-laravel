@extends('layouts.app')
@section('title', 'About')
@section('content')
    <section class="page-intro page-intro--about">
        <p class="eyebrow">About this project</p>
        <h1>A clearer view of today's work.</h1>
        <p class="intro-copy">Tasks for Today is a small team task tracker built for Web System Technologies.</p>
    </section>
    <section class="about-content" aria-labelledby="about-purpose-title">
        <div class="about-developer">
            <img class="about-photo" src="https://ik.imagekit.io/nsi7x5vhz/818875ea-6837-4d9a-aeb6-f81138f53250.jpg" alt="Pixel-art portrait of John Henrich Doroteo" width="150" height="160" loading="lazy">
            <div><p class="eyebrow">The developer</p><h2>John Henrich Doroteo</h2><p>I built Tasks for Today as a Web System Technologies project.</p></div>
        </div>
        <dl class="about-facts">
            <div><dt>Program</dt><dd>Bachelor of Science in Information Technology (BSIT)</dd></div>
            <div><dt>Specialization</dt><dd>Business Analytics</dd></div>
        </dl>
        <h2 id="about-purpose-title">About the project</h2>
        <p>The Welcome page shows only today's tasks. All Tasks lists the full schedule, and Profile displays the demo user saved in the database.</p>
        <h2>How it works</h2>
        <p>Laravel routes connect controllers to these pages. Eloquent models retrieve task and user records from SQLite, and Blade templates display them.</p>
    </section>
@endsection
