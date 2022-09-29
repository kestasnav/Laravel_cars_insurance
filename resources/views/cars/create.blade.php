@extends('layouts.carsLayout')
@section('content')


    <form action="{{ route('cars.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Valstybiniai numeriai</label>
            <input class="form-control" type="text" name="reg_number">
        </div>
        <div  class="mb-3">
            <label class="form-label">Automobilio markė</label>
            <input class="form-control" type="text" name="brand">
        </div>
        <div  class="mb-3">
            <label class="form-label">Automobilio modelis</label>
            <input class="form-control" type="text" name="model">
        </div>
        <div  class="mb-3">
            <label class="form-label">Savininko ID</label>
            <input class="form-control" type="text" name="owner_id">
        </div>


        <button class="btn btn-primary">Add</button>
    </form>
@endsection
