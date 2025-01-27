@extends('layout')
@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Product</h3>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('product.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="productname">
                        </div>
                        <div class="col-md-6">
                            <label>Category</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                @foreach ($brands as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>
                    </div>
                </form>
            </div>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $product->productname }}</td>
                        <td scope="col">{{ $product->category->catname }}</td>
                        <td scope="col">{{ $product->brand->brandname }}</td>
                        <td scope="col">{{ $product->price }}</td>
                        <td scope="col">
                            <a href="{{ route('product.edit', $product->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .form-area {
        padding: 20px;
        margin-top: 20px;
        background-color: #FFFF00;
    }
</style>
@endpush

@push('js')
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this product?");
    }
    function confirmUpdate() {
        return confirm("Are you sure you want to update this product?");
    }
</script>
@endpush



