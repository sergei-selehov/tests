@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        {{$product}}
                        <br>
                        Categories:
                        @foreach($categories as $category)
                            @foreach($category->categories as $cat)
                                <a style="color: black" href="{{url('/products/'.$cat->slug)}}">{{$cat->name}} </a>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection