@extends('layouts.app-front')

@section('head.title')
Contacts -
@endsection

@section('head.meta.keywords')
trayan ivanov,web developer,portfolio,personal website,php,html,html5,css,mysql,javascript,contact information
@endsection

@section('head.meta.description')
Contact information - Trayan Ivanov - web developer - personal website with portfolio of my work and information about me.
@endsection

@section('head.og.title'){{ 'Trayan Ivanov - web developer - Contacts' }}@endsection
@section('head.og.description'){{ 'Personal website with portfolio of my work and information about me.' }}@endsection
@section('head.og.image'){{ url('logo_dark.jpg') }}@endsection
@section('head.og.url'){{ url('/contacts') }}@endsection

@section('scripts.header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection

@section('content')
<div id="contacts" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h3>Contact me</h3>
        </div>

        <div class="col-sm-6">
            <form method="post" action={{ url('/contacts') }}>
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="form-control">
                </div>

                <div class="form-group">
                    <textarea rows="7" name="message" value="{{ old('message') }}" placeholder="Message" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-lg btn-block">Send</button>
                </div>
            </form>

             @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-sm-6">
            <i class="fa fa-lg fa-chevron-right"></i> Trayan Ivanov
            <br /><br />
            <i class="fa fa-lg fa-at"></i> E-mail: ivanov@trayan.co.uk
            <br /><br />
            <i class="fa fa-lg fa-phone"></i> Phone: +359 895 740 058
            <br /><br />
            <i class="fa fa-lg fa-share-alt"></i> Socials:
            <br /><br />
            <a href="https://www.facebook.com/trayan.ivanov" target="_blank"><i class="fa fa-3x fa-facebook-square"></i></a>
            <a href="https://plus.google.com/+TrayanIvanov"><i class="fa fa-3x fa-google-plus-square" target="_blank"></i></a>
            <a href="https://www.linkedin.com/in/trayanivanov?trk=nav_responsive_tab_profile"><i class="fa fa-3x fa-linkedin-square" target="_blank"></i></a>
            <a href="https://twitter.com/trayan_ivanov"><i class="fa fa-3x fa-twitter-square" target="_blank"></i></a>
            <a href="skype:ivanov.trayan"><i class="fa fa-3x fa-skype" target="_blank"></i></a>
        </div>
    </div>
    <div id="bot-space">&nbsp;</div>
</div>
@endsection
