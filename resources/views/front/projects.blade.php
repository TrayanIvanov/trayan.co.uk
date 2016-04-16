@extends('layouts.app-front')

@section('head.title')
My projects -
@endsection

@section('head.meta.keywords')
trayan ivanov,web developer,portfolio,personal website,php,html,html5,css,mysql,javascript,projects
@endsection

@section('head.meta.description')
List with all of the projects which I developed or participated - Project made by me - Trayan Ivanov - web developer - personal website with portfolio of my work and information about me.
@endsection

@section('head.og.title'){{ 'Trayan Ivanov - web developer - Projects' }}@endsection
@section('head.og.description'){{ 'Personal website with portfolio of my work and information about me.' }}@endsection
@section('head.og.image'){{ url('/images/logo_dark.jpg') }}@endsection
@section('head.og.url'){{ url('/projects') }}@endsection

@section('content')
<div id="all-projects" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h3>All of my projects</h3>
        </div>
        @foreach ($projects as $project)
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a href="{{ url('/project/'.$project->id) }}">
                    <img src="{{ $project->logo }}" class="img-thumbnail" />
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
