@extends('layouts.default')
@section('content')
    <div class="container">
        <h2 class="text text-center text-info">Add Inward-Outward Quantity</h2>

        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="row m-1">
                    <div class="col-md-6">
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

                <form action="{{ url('') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Material category*:</label>
                        <select class="form-control" name="category_id">
                            <option value="" selected>Select</option>
                            @foreach ($categories as $list)
                                <option value="{{ $list->id }}">{{ $list->category }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Material name*:</label>
                        <select class="form-control" name="material_id">
                            <option value="" selected>Select</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="form-control" placeholder="please select date" name="date">

                    </div>
                    <div class="form-group">
                        <label>Material inward-outward quantity*:</label>
                        <input type="text" class="form-control" placeholder="please select date" name="quantity"
                            value="">

                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>All Materials</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Material</th>
                            <th>Date</th>
                            <th>Qauntity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allMaterials as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category->category }}</td>
                                <td>{{ $item->material->name }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->quantity }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@stop
