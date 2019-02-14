@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                            @foreach($categoryProducts as $categoryProduct)
                                @foreach($categoryProduct->products as $product)
                                    {{$product}}
                                <a href="{{url('product/'.$product->id)}}">{{$product->name}}</a>
                                @endforeach
                            @endforeach

                        {{$categoryProducts->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection