@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Update form</div>
                <div class="card-body">
                    <form action="{{ route('shorts.update', $shortCode->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Valstybiniai numeriai</label>
                            <input class="form-control" type="text" name="shortcode" value="{{ $shortCode->shortcode }}">
                        </div>
                        <div  class="mb-3">
                            <label class="form-label">Automobilio markė</label>
                            <input class="form-control" type="text" name="replace" value="{{ $shortCode->replace }}">
                        </div>


                        <button class="btn btn-primary">Update</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('shorts.index') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

