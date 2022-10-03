@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Create form</div>
                <div class="card-body">
    <form action="{{ route('owners.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Vardas</label>
            <input class="form-control" type="text" name="name" >
        </div>
        <div  class="mb-3">
            <label class="form-label">Pavardė</label>
            <input class="form-control" type="text" name="surname" >
        </div>

        <button class="btn btn-primary">Add</button>
        <a class="btn btn-success mx-3 float-end" href="{{ route('owners.index') }}">Go Back</a>
    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
