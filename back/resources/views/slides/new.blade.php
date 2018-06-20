@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add slide</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{route('slide.store')}}" enctype="multipart/form-data">
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

                        <div class="form-group{{ $errors->has('footnote') ? ' has-error' : '' }}">
                            <label for="footnote" class="col-md-2 control-label">Footnone</label>
                            <div class="col-md-10">
                                <textarea id="footnote" type="text" class="form-control" name="footnote" required autofocus></textarea>
                                @if ($errors->has('footnote'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('footnote') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-2 control-label">Image</label>
                            <div class="col-md-10">
                                <input type="file" name="image" id="image">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-2">
                                <a class="btn btn-default" href="{{route('slides')}}">
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
