@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">

            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">
                    <!-- <span>languages</span> -->

                <div class="btn-group" role="group" aria-label="...">
                    <p>Languages</p>
                    <a class="btn btn-default" href="{{ url('/languages/new') }}">Add new language</a>
                </div>

                </li>
                @foreach($languages as $language)
                <li class="list-group-item list-group-item-primary">
                    <p>{{ $language->lang }}</p>
                    <p><a class="btn btn-danger" href="{{route('language.delete', $language->id)}}">Remove item</a></p>
                </li>
                @endforeach
            </ul>

            </div>
        </div>
    </div>
</div>
@endsection