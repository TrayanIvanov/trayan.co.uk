@extends('layouts.app-front')

@section('head.title')
{{ $project->name }} -
@endsection

@section('head.meta.keywords')
trayan ivanov,web developer,portfolio,personal website,php,html,html5,css,mysql,javascript,{{ $project->name }}
@endsection

@section('head.meta.description')
{{ $project->name }} - Project made by me - Trayan Ivanov - web developer - personal website with portfolio of my work and information about me.
@endsection

@section('scripts.header')
    <link rel="stylesheet" href="/css/libs/blueberry.css">
@endsection

@section('content')
<div id="selected-project" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h3>Project {{ $project->name }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7">
            <div class="blueberry">
                <ul class="slides">
                    @foreach ($project->photos as $photo)
                        <li>
                            <img src="{{ url($photo->path) }}" title="Trayan Ivanov - web developer" alt="Trayan Ivanov - web developer" />
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-5 info-top">
            <p><span class="section-title">Link:</span> {{ $project->url != "" ? $project->url : 'None'}}</p>
            <br />
            <p><span class="section-title">Release date:</span> {{ $project->release}}</p>
            <br />
            <p><span class="section-title">Contribution:</span><br /> {!! nl2br($project->contribution) !!}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <p><span class="section-title">Brief description:</span><br /> {!! nl2br($project->description) !!}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <br /><br /><a href="{{ url('/projects') }}" class="section-title"> &laquo Back to all projects</a>
        </div>
    </div>
</div>
@endsection

@section('scripts.footer')
<script src="/js/libs/jquery.blueberry.js"></script>

<script>
    $(document).ready(function() {
        $('.blueberry').blueberry();
    });
</script>

@endsection
