@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit experience</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="PUT" action="{{route('experience.update', $experience->id)}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
                            <label for="lang" class="col-md-2 control-label">Lang</label>
                            <div class="col-md-2">
                                <select id="lang" class="form-control" name="lang" >
                                    <option value="en" @if ($experience->lang == 'en') selected="selected" @endif> en</option>
                                    <option value="es" @if ($experience->lang == 'es') selected="selected" @endif> es</option>
                                </select>
                                @if ($errors->has('lang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-2 control-label">Position</label>
                            <div class="col-md-4">
                                <input id="position" type="text" class="form-control" name="position" value="{{ $experience->position }}" required autofocus>
                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                            <label for="start" class="col-md-2 control-label">Start</label>
                            <div class="col-md-2">
                                <input id="start" type="text" class="form-control datepicker" name="start" value="{{ date('d/m/Y', strtotime($experience->start)) }}" required autofocus>
                                @if ($errors->has('start'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                            <label for="end" class="col-md-2 control-label">End</label>
                            <div class="col-md-2">
                                <input id="end" type="text" class="form-control datepicker" name="end" value="{{ date('d/m/Y', strtotime($experience->end)) }}" required autofocus>
                                @if ($errors->has('end'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-2 control-label">Company</label>
                            <div class="col-md-4">
                                <input id="company" type="text" class="form-control" name="company" value="{{ $experience->company }}" required autofocus>
                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-2 control-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="description" type="text" class="form-control" name="description" required autofocus>{{ $experience->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('links') ? ' has-error' : '' }}">
                            <label for="links" class="col-md-2 control-label">Links</label>
                            <div class="col-md-10">
                                <textarea id="links" type="text" class="form-control" name="links" required autofocus>{{ $experience->links }}</textarea>
                                @if ($errors->has('links'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('links') }}</strong>
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
                                    Update
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
