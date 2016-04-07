@extends('layouts.app-hq')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('hq/project/create') }}" class="btn btn-default">Create new project</a>
                <a class="btn btn-default pull-right">Sort projects</a>
            </div>
        </div>
    </div>


    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                All projects
            </div>

            <div class="panel-body">
                @if (count($projects) > 0)
                    <table class="table table-striped task-table">
                        <thead>
                            <th style="width: 30px">&nbsp;</th>
                            <th>Name</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>
                                        <a href="{{ url('/hq/project/'. $project->id .'/bulk') }}">
                                            <span class="glyphicon glyphicon-picture" aria-hidden="true" title="Bulk"></span>
                                        </a>
                                    </td>
                                    <td class="table-text">
                                        <a href="{{ url('/hq/project/' . $project->id . '/edit') }}">{{ $project->name }}</a>
                                    </td>
                                    <td>
                                        {{ csrf_field() }}
                                        <button value="{{ $project->id }}" class="btn btn-danger btn-xs pull-right inl-mrg project-delete">Delete</button>
                                        <button value="{{ $project->id }}" class="btn {{ $project->active == 1 ? 'btn-success' : 'btn-default'}} btn-xs pull-right inl-mrg project-activate">Active</button>
                                        <button value="{{ $project->id }}" class="btn {{ $project->frontman == 1 ? 'btn-info' : 'btn-default'}} btn-xs pull-right inl-mrg project-index">Index</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No projects</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts.footer')
    <script>
        var csrf_token = '{{ csrf_token() }}';
        var url_current = '{{ URL::current() }}';
    </script>
    <script src="/js/hq-projects.js"></script>
@endsection
