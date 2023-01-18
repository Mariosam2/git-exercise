@extends('layouts.admin')


@section('content')
    <div class="container min-vh-100">
        @include('partials.errors')
        <form action="{{ route('admin.products.store') }}" class="p-4 mt-4" method="post" enctype="multipart/form-data">
            @csrf
            <!-- input for the product name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    aria-describedby="helpId">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <!-- input file for the product image-->
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
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @empty
                            No tags..
                        @endforelse

                    </select>
                </div>
            </div>
            <!-- input for the product description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <!-- input for the product price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control"
                    value="{{ old('price') }}" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <button type="submit" class="btn btn-secondary">Add</button>
        </form>
    </div>
@endsection
