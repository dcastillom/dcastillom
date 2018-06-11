@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="container">
                <p>{{ $experiences->links() }}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
            @foreach($experiences as $experience)
            <div class="panel panel-default col-md-4">
                <div class="panel-heading">
                <h3 class="panel-title">{{ substr($experience->position, 0, 25) }}...</h3>
                <a class="" href="{{route('experience.delete', $experience->id)}}?{{time()}}">
                    Remove item
                </a>
                </div>
                <div class="panel-body">
                <p>{{ substr($experience->company, 0, 30) }}...</p>
                <p>
                    {{ date('M y', strtotime($experience->start)) }}
                    <span>-<span>
                    {{ date('M y', strtotime($experience->end)) }}
                </p>
                <p>{{ substr($experience->description, 0, 70) }}...</p>
                <a class="btn btn-default btn-block" href="{{route('experience.show', $experience->id)}}?{{time()}}">
                    Edit item
                </a>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection