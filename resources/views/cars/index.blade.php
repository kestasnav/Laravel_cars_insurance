@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Cars</div>
                <div class="card-body">
                    <a class="btn btn-primary float-end " href="{{ route('cars.create') }}">Add new Car</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Automobilio nuotrauka</th>
                            <th>Nuotraukų galerija</th>
                            <th>Valstybiniai numeriai</th>
                            <th>Automobilio markė</th>
                            <th>Automobilio modelis</th>
                            <th>Savininkas</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cars as $car)
                            <tr>
                                <td>
                                   @foreach($images as $image)
                                    @if ($image->car_id == $car->id)

                                        <img src="{{ route('image.cars',$image->img) }}" style=" width: 150px; height: 150px;">
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td> <a class="btn btn-primary " href="{{ route('cars.show', $car->id) }}">Galery</a></td>
                                <td>{{ $car->reg_number }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>
                                    {{ $car->owner->name }}
                                    {{ $car->owner->surname }}
                                </td>
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
