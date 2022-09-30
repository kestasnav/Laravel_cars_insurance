@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Update form</div>
                <div class="card-body">
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
        <a class="btn btn-success mx-3 float-end" href="{{ route('cars.index') }}">Go Back</a>
    </form>
                    </div>
                </div>
            </div>

        </div>
@endsection

