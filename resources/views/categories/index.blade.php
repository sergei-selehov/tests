@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Categories</h3>
                        <a href="{{url('category/add')}}">Add</a>
                    </div>

                    <div class="card-body">
                        @foreach($categories as $category)
                            <p>
                                <a style="color: black" href="{{url('/products/'.$category->slug)}}">{{$category->name}} </a>
                                <a style="color: blue" href="{{url('category/edit/'.$category->slug)}}"> Edit</a>
                                <a style="color: red" href="{{url('category/delete/'.$category->slug)}}"> Deleted</a>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection