@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Create form</div>
                <div class="card-body">
                    <form action="{{ route('shorts.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Short Code</label>
                            <input class="form-control @error('shortcode') is-invalid @enderror" type="text" name="shortcode" value="{{old('shortcode')}}">
                            @error('shortcode')
                            @foreach( $errors->get('shortcode') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pakeitimas</label>
                            <input class="form-control @error('replace') is-invalid @enderror" type="text" name="replace" value="{{old('replace')}}">
                            @error('brand')
                            @foreach( $errors->get('replace') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>



                        <button class="btn btn-primary">Add</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('shorts.index') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

