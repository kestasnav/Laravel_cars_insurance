@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{__('Savininkai')}}</div>
                <div class="card-body">
    <a class="btn btn-primary float-end" href="{{ route('owners.create') }}">{{__('Pridėti naują savininką')}}</a>
    <table class="table">
        <thead>
        <tr>
            <th>{{__('Vardas')}}</th>
            <th>{{__('Pavardė')}}</th>
            <th>{{__('El. Paštas')}}</th>
            <th>{{__('Turimi automobiliai')}}</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($owners as $owner)
            <tr>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->surname }}</td>
                <td>{{ $owner->email }}</td>
                <td>
                    @foreach($owner->car as $oc)
                   [{{ $oc->brand }}
                        {{ $oc->model }}]
                    @endforeach
                </td>
                <td><a class="btn btn-success" href="{{ route('owners.edit', $owner->id) }}">{{__('Atnaujinti')}}</a> </td>
                <td>
                    <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
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
