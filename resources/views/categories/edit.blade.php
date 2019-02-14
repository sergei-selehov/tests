@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category {{$category->name}}</div>
                    <div class="card-body">
                        <form method="POST">
                            {{ csrf_field() }}
                            <p>
                                <label for="status">Status:</label>
                                <input min="0" max="1" type="number" value="{{$category->status}}" id="status" name="status" required>
                            </p>
                            <p>
                                <label for="name">Name:</label>
                                <input type="text" value="{{$category->name}}" id="name" name="name" required>
                            </p>
                            <p>
                                <label for="slug">Slug:</label>
                                <input type="text" value="{{$category->slug}}" id="slug" name="slug" required>
                            </p>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection