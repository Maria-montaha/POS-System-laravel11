@extends('layout')
@section('content')
<div class="container">
    <h3 align="center" class="mt-5">category</h3>
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
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>category Name</label>
                            <input type="text" class="form-control" name="catname">
                        </div>
                        <div class="col-md-6">
                            <label>status</label>
                            <select name="status" id="status" class="form-control">
                                <option selected>select menu</option>
                                <option value="1">True</option>
                                <option value="0">false</option>


                            </select>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div> -->
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
                        <th scope="col">category Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ( $categories as $key => $category )
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $category->catname }}</td>
                        <td scope="col">
                            <!-- {{$category->status}} -->
                            @if($category->status==1)
                            true
                            @else
                            false
                            @endif

                        </td>
                        <td scope="col">
                            <a href="{{  route('category.edit', $category->id) }}" onsubmit="return confirmUpdate()">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline" onsubmit="return confirmDelete()">
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

    .bi-trash-fill {
        color: red;
        font-size: 18px;
    }

    .bi-pencil {
        color: green;
        font-size: 18px;
        margin-left: 20px;
    }
</style>
@endpush

@push('js')
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this category?");
    }
    function confirmUpdate() {
        return confirm("Are you sure you want to update this category?");
    }
    document.querySelector('.update-category-form').addEventListener('submit', function(e) {
        if (!confirm("Are you sure you want to update this category?")) {
            e.preventDefault(); 
        }
    });
</script>
@endpush