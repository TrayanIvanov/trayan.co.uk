@extends('layouts.app-hq')

@section('content')
    <div class="panel-body">
        <h3 class="no-margin">Add new project</h3>

        <hr>

        <div class="row">
            <form method="post" action="/hq/project" enctype="multipart/form-data" class="project-form">
                @include('hq.projects.form')
                @include('hq.partials.form_errors')
            </form>
        </div>
    </div>
@stop
