<div class="col-md-6">
    {{ csrf_field() }}

    @if (isset($project))
        {{ method_field('put') }}
    @endif

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', isset($project->name) ? $project->name : null) }}">
    </div>

    <div class="form-group">
        <label for="url">Url:</label>
        <input type="text" name="url" id="url" class="form-control" value="{{ old('url', isset($project->url) ? $project->url : null) }}">
    </div>

    <div class="form-group">
        <label for="release">Release date:</label>
        <input type="date" name="release" id="release" class="form-control" value="{{ old('release', isset($project->release) ? $project->release : null) }}">
    </div>

    <div class="form-group">
        <label for="logo">Logo (200px x 150px):</label>
        <input type="file" name="logo" id="logo" class="form-control" value="{{ old('logo', isset($project->logo) ? $project->logo : null) }}">
        @if (isset($project) && $project->logo != '')
            <img src="{{ url($project->logo) }}" class="img-responsive img-thumbnail project-thumb">
        @endif
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="contribution">Contribution:</label>
        <textarea name="contribution" id="contribution" class="form-control" rows="4">{{ old('contribution', isset($project->contribution) ? $project->contribution : null) }}</textarea>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', isset($project->description) ? $project->description : null) }}</textarea>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        @if (isset($project))
            <button type="submit" class="btn btn-primary">Update project</button>
        @else
            <button type="submit" class="btn btn-primary">Create project</button>
        @endif
        <a href="{{ url('/hq/project') }}" class="btn btn-default">Back to all</a>
    </div>
</div>
