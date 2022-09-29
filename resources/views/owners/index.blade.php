@extends('layouts.ownersLayout')
@section('content')
    <a class="btn btn-primary float-end" href="{{ route('owners.create') }}">Add new Owner</a>
    <table class="table">
        <thead>
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($owners as $owner)
            <tr>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->surname }}</td>
                <td><a class="btn btn-success" href="{{ route('owners.edit', $owner->id) }}">Update</a> </td>
                <td>
                    <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
