@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <p>{{ $introductions->links() }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="container">

            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">
                    <!-- <span>introductions</span> -->

                <div class="btn-group" role="group" aria-label="...">
                    <p>Introductions</p>
                    <a class="btn btn-default" href="{{route('introduction.create')}}">Add new introduction</a>
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
                @foreach($introductions as $introduction)
                <li class="list-group-item list-group-item-primary">

                    <img src=" {{ asset('upload/avatar'). '/' . $introduction->avatar }} ">

                    <p>{{ $introduction->greeting }}</p>
                    <p>{{ $introduction->intro }}</p>
                    <p>
                        <a class="btn btn-danger" href="{{route('introduction.delete', $introduction->id)}}">Remove item</a>
                        <a class="btn btn-default" href="{{route('introduction.show', $introduction->id)}}">Edit item</a>
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

        window.location.href = "/introductions/filter/" + lang;
    }
</script>