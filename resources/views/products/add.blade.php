@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Category</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <p>
                                <label for="status">Status:</label>
                                <input min="0" max="1" type="number" id="status" name="status" required>
                            </p>
                            <p>
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                            </p>
                            <p>
                                <label for="article">Article:</label>
                                <input type="text" id="article" name="article" required>
                            </p>
                            <p>
                                <label for="new">New:</label>
                                <input min="0" max="1" type="number" id="new" name="new" required>
                            </p>
                            <p>
                                <label for="popular">Popular:</label>
                                <input min="0" max="1" type="number" id="popular" name="popular" required>
                            </p>
                            <p>
                                <label for="image">Image:</label>
                                <input type="file" name="image" id="image" required>
                            <p>
                                <label for="description">Description:</label>
                                <textarea id="description" name="description" required ></textarea>
                            </p>
                            <p>
                                <label for="additional_attributes">Additional Attributes:</label>
                                <input type="text" id="additional_attributes" name="additional_attributes">
                            </p>
                            <p>
                                <label for="category_id">Categories:</label>
                                <select multiple name="category_id[]" id="category_id">
                                    @foreach(\App\Categories::where('status', '!=', 0)->get() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection