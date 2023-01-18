@extends('layouts.admin')


@section('content')
    <div class="container min-vh-100">
        @include('partials.errors')
        <form action="{{ route('admin.products.update', $product->id) }}" class="p-4 mt-4" method="post"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- input for the product name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $product->name) }}" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <!-- input for the product description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $product->description) }}</textarea>
            </div>
            <!-- input for the product price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control"
                    value="{{ old('price', $product->price) }}" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <button type="submit" class="btn btn-secondary">Edit</button>
        </form>
    </div>
@endsection
