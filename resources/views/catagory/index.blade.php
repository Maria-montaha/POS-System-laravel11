@extends('layout')
@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Catagory</h3>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('catagory.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Catagory Name</label>
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
                        <th scope="col">Catagory Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ( $catagories as $key => $catagory )
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $catagory->catname }}</td>
                        <td scope="col">
                            <!-- {{$catagory->status}} -->
                            @if($catagory->status==1)
                            true
                            @else
                            false
                            @endif

                        </td>
                        <td scope="col">
                            <a href="{{  route('catagory.edit', $catagory->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form action="{{ route('catagory.destroy', $catagory->id) }}" method="POST" style="display:inline">
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