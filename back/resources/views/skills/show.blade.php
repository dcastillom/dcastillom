@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit skill</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="PUT" action="{{route('skill.update', $skill->id)}}">
                        {{ csrf_field() }}          

                        <div class="form-group{{ $errors->has('skill') ? ' has-error' : '' }}">
                            <label for="skill" class="col-md-2 control-label">Skill</label>
                            <div class="col-md-4">
                                <input id="skill" type="text" class="form-control" name="skill" value="{{ $skill->skill }}" required autofocus>
                                @if ($errors->has('skill'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('skill') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-2 control-label">Level</label>
                            <div class="col-md-2">
                                <select id="level" class="form-control" name="level" >
                                    @foreach ($levels as $key=>$value)
                                    <option value="{{$value}}" @if ($skill->level == $value) selected="selected" @endif> {{ $value }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-2">
                                <a class="btn btn-default" href="{{route('skills')}}">
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
