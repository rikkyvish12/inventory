@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="row m-1">
                    <div class="col-md-12">
                        @if (session('status'))
                            <div class="alert alert-info" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <h2 class="text text-center text-info">{{ $category_update ? 'Update' : 'Add' }} Category</h2>
                @php $route = ($category_update) ? 'category/'.$category_update->id : 'category' @endphp
                @php $method = ($category_update) ? 'PUT' : 'POST' @endphp
                <form action="{{ url($route) }}" method="POST">
                    @csrf
                    @method($method)

                    <div class="form-group">
                        <label>Category:</label>
                        <input type="text" class="form-control" id="category" placeholder="Enter category name"
                            name="category" value="{{ $category_update ? $category_update->category : '' }}">
                    </div>
                    <button type="submit" class="btn btn-default">{{ $category_update ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>

    </div>

    <div class="container">
        <h2>All Category</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category }}</td>
                            <td><a href="{{ url('category/' . $category->id) }}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{ url('category/' . $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>

@stop
