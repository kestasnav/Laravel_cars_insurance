@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Create form</div>
                <div class="card-body">
                    <form action="{{ route('cars.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Valstybiniai numeriai</label>
                            <input class="form-control" type="text" name="reg_number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Automobilio markė</label>
                            <input class="form-control" type="text" name="brand">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Automobilio modelis</label>
                            <input class="form-control" type="text" name="model">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Savininkas</label>
                            <select class="form-control" name="owner_id">
                                <option selected>Pasrinkti</option>
                                @foreach($owners as $owner)
                                    <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>
                                @endforeach
                            </select>
                        </div>


                        <button class="btn btn-primary">Add</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('cars.index') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
