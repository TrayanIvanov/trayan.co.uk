@extends('layouts.app-front')

@section('head.title')
About -
@endsection

@section('head.meta.keywords')
trayan ivanov,web developer,portfolio,personal website,php,html,html5,css,mysql,javascript,about me
@endsection

@section('head.meta.description')
About me page - Trayan Ivanov - web developer - personal website with portfolio of my work and information about me.
@endsection

@section('head.og.title'){{ 'Trayan Ivanov - web developer - About' }}@endsection
@section('head.og.description'){{ 'Personal website with portfolio of my work and information about me.' }}@endsection
@section('head.og.image'){{ url('/images/logo_dark.jpg') }}@endsection
@section('head.og.url'){{ url('/about') }}@endsection

@section('content')
<div id="about" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h3>That's me</h3>
        </div>

        <div class="col-xs-12">
            <img src="/images/me.jpg" class="img-thumbnail" />
        </div>

        <div class="col-xs-12">
            <p>
                My name is Trayan Ivanov and this is my personal web site. Here you can find my portfolio and information about me.<br />
                I am web developer from Marten, Ruse, Bulgaria.<br />
                I have skills in web development, PHP, MySQL, HTML, HTML5, CSS3, JavaScript (also jQuery library) and some others.<br />
                Please enjoy looking in my modest website.<br />
                Long live rock and roll!<br />
            </p>
        </div>
    </div>
</div>
@endsection
