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
            <h2 class="text text-center text-info">{{ $material_update ? 'Update' : 'Add' }} Material</h2>
            @php $route = ($material_update) ? 'material/'.$material_update->id : 'material' @endphp
            @php $method = ($material_update) ? 'PUT' : 'POST' @endphp
            <form action="{{ url($route) }}" method="POST">
                @csrf
                @method($method)

                <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter material name" name="name" value="{{ ($material_update) ? $material_update->name : '' }}">
                </div>
                <div class="form-group">
                    <label>Opening Balance:</label>
                    <input type="text" class="form-control"  placeholder="Enter material Oening Balance" name="opening_balance" value="{{ ($material_update) ? $material_update->opening_balance : '' }}">

                </div>
                <button type="submit" class="btn btn-default">{{ ($material_update) ? 'Update' : 'Submit'}}</button>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>

</div>

<div class="container">
    <h2>All material</h2>
    <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Opening Balance</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @if (count($materials) > 0)
                @foreach ($materials as $material)
                    <tr>
                        <td>{{ $material->id }}</td>
                        <td>{{ $material->name }}</td>
                        <td>{{ $material->opening_balance }}</td>
                        <td><a href="{{ url('material/'.$material->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ url('material/'.$material->id) }}" method="POST">
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
