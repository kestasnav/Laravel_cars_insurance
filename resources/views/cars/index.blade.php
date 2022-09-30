@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Cars</div>
                <div class="card-body">
                    <a class="btn btn-primary float-end" href="{{ route('cars.create') }}">Add new Car</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Valstybiniai numeriai</th>
                            <th>Automobilio markė</th>
                            <th>Automobilio modelis</th>
                            <th>Savininko ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->reg_number }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->owner_id }}</td>
                                <td><a class="btn btn-success" href="{{ route('cars.edit', $car->id) }}">Update</a></td>
                                <td>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
