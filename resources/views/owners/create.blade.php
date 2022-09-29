@extends('layouts.ownersLayout')
@section('content')


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
    </form>
@endsection
