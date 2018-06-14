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

            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">
                    <!-- <span>Experiences</span> -->

                <div class="btn-group" role="group" aria-label="...">
                    <p>Experiences</p>
                    <a class="btn btn-default" href="{{ url('/experiences/new') }}">Add new experience</a>
                    <div class="btn-group" role="group">
      
                        <select class="form-control" onchange="filter(this.value)">
                            <option value="all">Show all</option>
                            @foreach ($langs as $key=>$value)
                            <option @if ($value == $lang) selected="selected" @endif> {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                </li>
                @foreach($experiences as $experience)
                <li class="list-group-item list-group-item-primary">
                    <p> 
                        <span class="label label-info">{{ $experience->lang }}</span><br>
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

<script>
    function filter(lang) {

        window.location.href = "/experiences/filter/" + lang;
    }
</script>