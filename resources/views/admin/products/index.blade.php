@extends('layouts.admin')


@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Products</h1>
                <p class="lead text-muted">All Products</p>
                <p>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary text-white my-2"><i
                            class="fa-solid fa-plus"></i></a>

                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            @include('partials.messages')
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.products.show', $product->id) }}" type="button"
                                            class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" type="button"
                                            class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <h2>No Products yet...</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
