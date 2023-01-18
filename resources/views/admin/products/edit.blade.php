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
            <div class="d-flex">
                <div class="mb-3">
                    <label for="image" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="image" id="image" aria-describedby="fileHelpId">
                    <div id="fileHelpId" class="form-text">Help text</div>
                </div>
                <div class="mb-3 ms-4">
                    <label for="" class="form-label">Tags</label>
                    <select multiple class="form-select form-select-lg" name="tags[]" id="tags">
                        <option disabled>Select one</option>
                        @forelse($tags as $tag)
                            @if ($errors->any())
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @else
                                <option value="{{ $tag->id }}"
                                    {{ $product->tags->contains($tag->id) ? 'selected' : '' }}>
                                    {{ $tag->name }}</option>
                            @endif
                        @empty
                            No tags..
                        @endforelse


                    </select>
                </div>
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
