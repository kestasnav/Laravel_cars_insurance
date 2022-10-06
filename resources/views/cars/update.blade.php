@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Update form</div>
                <div class="card-body">
    <form action="{{ route('cars.update', $car->id) }}" method="post" enctype="multipart/form-data">
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
            <label for="" class="form-label">Savininkas</label>
            <select class="form-control" name="owner_id">

                @foreach($owners as $owner)
                    <option value="{{$owner->id}}" {{$car->owner_id == $owner->id ? 'selected' : ''}}>{{ $owner->name }} {{ $owner->surname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Automobilio nuotrauka:</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button class="btn btn-primary">Update</button>
        <a class="btn btn-success mx-3 float-end" href="{{ route('cars.index') }}">Go Back</a>
    </form>
                    </div>
                </div>
            </div>

        </div>
@endsection

