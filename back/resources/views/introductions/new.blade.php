@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit introduction</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{route('introduction.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
                            <label for="lang" class="col-md-2 control-label">Lang</label>
                            <div class="col-md-2">
                                <select id="lang" class="form-control" name="lang" >
                                    @foreach ($langs as $key=>$value)
                                    <option> {{ $value }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('lang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('greeting') ? ' has-error' : '' }}">
                            <label for="greeting" class="col-md-2 control-label">Greeting</label>
                            <div class="col-md-10">
                                <textarea id="greeting" type="text" class="form-control" name="greeting" required autofocus></textarea>
                                @if ($errors->has('greeting'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('greeting') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('intro') ? ' has-error' : '' }}">
                            <label for="intro" class="col-md-2 control-label">Intro</label>
                            <div class="col-md-10">
                                <textarea id="intro" type="text" class="form-control" name="intro" required autofocus></textarea>
                                @if ($errors->has('intro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('intro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-2 control-label">Avatar</label>
                            <div class="col-md-10">
                                <input type="file" name="avatar" id="avatar">
                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-2">
                                <a class="btn btn-default" href="{{route('experiences')}}">
                                    Go back
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
