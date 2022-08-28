@extends('layouts.ledit')

@section('title', 'Edit products')

@section('content')
<div class="d-flex justify-content-center">
    <div class="h-50 d-inline-block w-50 p-3" id="right_login">
        <h3 class="text-center mt-3">Editing {{$products->name}}</h3>
        <form action="{{route('update', ['id' => $products->id])}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input name="name" type="name" class="form-control" id="exampleInputName1"
                    placeholder="Enter the products name" value="{{old('name', $products->name)}}">

                @error('name')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputDescription1">Description</label>
                <textarea class="form-control" id="exampleInputDescription1" name="description" type="description"
                    rows="10">
                    {{old('description', $products->description)}}
                </textarea>


                @error('discription')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPrice1">Price</label>
                <input name="price" type="price" class="form-control" id="exampleInputPrice1"
                    placeholder="Enter the price for the product" value="{{old('price', $products->price)}}">

                @error('price')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputUrl1">Url</label>
                <input name="url" type="url" class="form-control" id="exampleInputUrl1" placeholder="Change the photo"
                    value="{{old('url', $products->url)}}">

                @error('url')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" id="space">Finalize</button>
            </div>
        </form>
    </div>
</div>
@endsection