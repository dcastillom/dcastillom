@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create language</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{route('language.store')}}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
                            <label for="lang" class="col-md-4 control-label">Language (Ej. es, en, fr...)</label>
                            <div class="col-md-2">
                                <input id="lang" type="text" class="form-control" name="lang" value="" required autofocus>
                                @if ($errors->has('language'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-2">
                                <a class="btn btn-default" href="{{route('languages')}}">
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
