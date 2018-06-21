@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <p>{{ $skills->links() }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="container">

            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">
                <div class="btn-group" role="group" aria-label="...">
                    <p>Skills</p>
                    <a class="btn btn-default" href="{{route('skill.create')}}">Add new skill</a>
                </div>

                </li>
                @foreach($skills as $skill)
                <li class="list-group-item list-group-item-primary">
                    <p>{{ $skill->skill }}</p>
                    <p>{{ $skill->level }}</p>
                    <p>
                        <a class="btn btn-danger" href="{{route('skill.delete', $skill->id)}}">Remove item</a>
                        <a class="btn btn-default" href="{{route('skill.show', $skill->id)}}">Edit item</a>
                    </p>
                </li>
                @endforeach
            </ul>

            </div>
        </div>
    </div>
</div>
@endsection