@extends('layouts.ldashboard')

@section('title', 'Add products')

@section('content')
<div class="d-flex justify-content-center">
    <div class="h-50 d-inline-block w-50 p-3" id="right_login">
        <h3 class="text-center mt-3">Add new products</h3>
        <form action="{{route('store_product')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input name="name" type="name" class="form-control" id="exampleInputName1"
                    placeholder="Enter the products name" value="">

                @error('name')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputDescription1">Description</label>
                <textarea class="form-control" id="exampleInputDescription1" name="description" type="description"
                    rows="10"></textarea>


                @error('discription')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPrice1">Price</label>
                <input name="price" type="price" class="form-control" id="exampleInputPrice1"
                    placeholder="Enter the price for the product">

                @error('price')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputUrl1">URL</label>
                <input name="url" type="url" class="form-control" id="exampleInputUrl1">

                @error('url')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" id="space">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection