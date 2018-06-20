@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <p>{{ $slides->links() }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="container">

            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">
                    <!-- <span>slides</span> -->

                    <div class="btn-group" role="group" aria-label="...">
                        <p>Slides</p>
                        <a class="btn btn-default" href="{{route('slide.create')}}">Add new slide</a>
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
                @foreach($slides as $slide)
                <li class="list-group-item list-group-item-primary">

                    <img src=" {{ asset('upload/swiper'). '/' . $slide->image }} ">

                    <p>{{ $slide->footnote }}</p>
                    <p>
                        <a class="btn btn-danger" href="{{route('slide.delete', $slide->id)}}">Remove item</a>
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
        window.location.href = "/slides/filter/" + lang;
    }
</script>