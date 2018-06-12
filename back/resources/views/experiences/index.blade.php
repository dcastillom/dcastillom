@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <p>{{ $experiences->links() }}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <p><a class="btn btn-default" href="{{ url('/experiences/new') }}">Add new experience</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container">

            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">Experiences</li>
                @foreach($experiences as $experience)
                <li class="list-group-item list-group-item-primary">
                    <p>
                        {{ $experience->position }}<br>
                        {{ date('F Y', strtotime($experience->start)) }}&nbsp;-&nbsp;{{ date('F Y', strtotime($experience->end)) }}<br>
                        {{ $experience->company }}<br>
                        {{ $experience->description }}<br>
                        {{ $experience->links }}<br>
                    </p>
                    <p>
                        <a class="btn btn-danger" href="{{route('experience.delete', $experience->id)}}">Remove item</a>
                        <a class="btn btn-default" href="{{route('experience.show', $experience->id)}}">Edit item</a>
                    </p>
                </li>
                @endforeach
            </ul>

            </div>
        </div>
    </div>
</div>
@endsection