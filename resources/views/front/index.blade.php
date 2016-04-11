@extends('layouts.app-front')

@section('content')
<div class="container-fluid header-index">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    &lt;!DOCTYPE html&gt;<br />
                    &lt;html&gt;<br />
                    &lt;head&gt;<br />
                    &lt;title&gt;Trayan Ivanov - web developer&lt;/title&gt;<br />
                    &lt;meta name="Keywords" content="Web Development, PHP, MySQL, CSS, HTML, JavaScript, CMS, Portfolio" /&gt;<br />
                    &lt;meta name="Description" content="Personal web site of Trayan Ivanov - web developer from Rousse" /&gt;<br />
                    &lt;/head&gt;<br />
                    &lt;?php echo "Hello there! This is my personal website."; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <article>
                <h3>My modest website</h3>
                <br />
                <p>
                    Hello there! I am Trayan and here you can find some information about me. I am web developer currently located in Sofia, Bulgaria working for <a href="http://www.proxiad.com" target="_blank">Proxiad Bulgaria</a>.<br />
                    Most of the projects that I have participated or fully developed are included. Exception are the ERP systems that for good reasons I can not show.<br />
                    The design is made by my friend and ex-colleague Kiril Semkov. Thanks for the efforts mate!<br />
                    The development is done by me (:
                </p>
            </article>
        </div>

        <div class="col-md-8" id="projects-index">
            <h3>Favourite projects</h3>
            <br />
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-xs-4">
                        <a href="{{ url('/project/'.$project->id) }}">
                            <img src="{{ $project->logo }}" class="img-thumbnail" />
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ url('/projects') }}" class="btn btn-info btn-lg btn-block">View all my projects</a>
                </div>
            </div>
        </div>
    </div>
    <div id="bot-space">&nbsp;</div>
</div>
@endsection
