@extends('layouts.carsLayout')
@section('content')


    <form action="{{ route('cars.update', $car->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Valstybiniai numeriai</label>
            <input class="form-control" type="text" name="reg_number" value="{{ $car->reg_number }}">
        </div>
        <div  class="mb-3">
            <label class="form-label">Automobilio markė</label>
            <input class="form-control" type="text" name="brand" value="{{ $car->brand }}">
        </div>
        <div  class="mb-3">
            <label class="form-label">Automobilio modelis</label>
            <input class="form-control" type="text" name="model" value="{{ $car->model }}">
        </div>
        <div  class="mb-3">
            <label class="form-label">Savininko ID</label>
            <input class="form-control" type="text" name="owner_id" value="{{ $car->owner_id }}">
        </div>


        <button class="btn btn-primary">Update</button>
    </form>
@endsection

