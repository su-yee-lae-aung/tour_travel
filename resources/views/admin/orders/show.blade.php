@extends('admin.layouts.master')
@section('title', 'Product')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Admins</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>


                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div>
                <a href="{{ route('admin.products.index') }}" class="btn btn-dark mb-3">All Products</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">{{ $product->name }}</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                        @csrf
                        @php
                            $imagePath = 'images/products/' . $product->image;
                            $imageToShow = file_exists(public_path($imagePath)) ? asset($imagePath) : $product->image;
                        @endphp
                        <img alt="{{ $product->name }}" class="image-thumbnail w-100" src="{{ $imageToShow }}">
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input readonly type="text" value="{{ $product->name }}" class="form-control" name="name"
                                placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <span class="input-group-text">MMK</span>
                            <input readonly type="number" value="{{ $product->price }}" name="price" class="form-control"
                                required>
                            <span class="input-group-text">.00</span>
                            <div class="invalid-feedback">Please enter your price.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <input readonly type="number" value="{{ $product->quantity }}" name="quantity"
                                class="form-control" required>
                            <div class="invalid-feedback">Please enter your price.</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group has-validation">
                            <select readonly name="category_id" id="inputState" class="form-select">
                                <option>{{ $product->category->name }}</option>
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <textarea name="description" id="mytextarea">{{ $product->description }}</textarea>
                        <div class="text-center">
                            {{-- <button type="submit" class="btn btn-dark">Create</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'placeholder',
            setup: function(editor) {
                editor.on('init', function() {
                    editor.getContainer().querySelector('.tox-editor-container').style.minHeight =
                        '200px';
                });
            },
            placeholder: 'Enter your content here...'
        });
    </script>
@endsection