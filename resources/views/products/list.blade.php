@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{url('product/add')}}">Add</a>
                    </div>
                    <form method="POST">
                        {{ csrf_field() }}
                        <input hidden value="1" name="new" type="text">
                        <button type="submit">New</button>
                    </form>
                    <form method="POST">
                        {{ csrf_field() }}
                        <input hidden value="2" name="popular" type="text">
                        <button type="submit">Popular</button>
                    </form>
                    <form method="POST">
                        {{ csrf_field() }}
                        <p>
                            <label for="category_id">Categories:</label>
                            <select name="category_id" id="category_id">
                                @foreach(\App\Categories::get() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </p>
                        <button type="submit">Submit</button>
                    </form>

                    <div class="card-body">
                        @foreach($products as $product)
                            {{$product}}
                            <a href="{{url('product/show/'.$product->id)}}">{{$product->name}}</a>
                            <p>
                                <a style="color: black" href="{{url('product/show/'.$product->id)}}">{{$product->name}} </a>
                                <a style="color: blue" href="{{url('product/edit/'.$product->id)}}"> Edit</a>
                                <a style="color: red" href="{{url('product/delete/'.$product->id)}}"> Deleted</a>
                            </p>
                        @endforeach

                        {{$products->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection