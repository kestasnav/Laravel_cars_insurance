@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{__('Automobiliai')}}</div>
                <div class="card-body">
                    <a class="btn btn-primary float-end " href="{{ route('cars.create') }}">{{__('Pridėti naują mašiną')}}</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{__('Automobilio nuotrauka')}}</th>
                            <th>{{__('Nuotraukų galerija')}}</th>
                            <th>{{__('Valstybiniai numeriai')}}</th>
                            <th>{{__('Automobilio markė')}}</th>
                            <th>{{__('Automobilio modelis')}}</th>
                            <th>{{__('Automobilio savininkas')}}</th>
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
                                <td> <a class="btn btn-primary " href="{{ route('cars.show', $car->id) }}">{{__('Galerija')}}</a></td>
                                <td>{{ $car->reg_number }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>
                                    {{ $car->owner->name }}
                                    {{ $car->owner->surname }}
                                </td>
                                <td><a class="btn btn-success" href="{{ route('cars.edit', $car->id) }}">{{__('Atnaujinti')}}</a></td>
                                <td>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">{{__('Ištrinti')}}</button>
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
