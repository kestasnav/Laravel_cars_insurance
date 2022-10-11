@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{__('Trumpieji kodai')}}</div>
                <div class="card-body">
                    @can('create', \App\Models\ShortCode::class)
                    <a class="btn btn-primary float-end" href="{{ route('shorts.create') }}">{{__('Pridėti naują kodą')}}</a>
                    @endcan
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{__('Kodas')}}</th>
                            <th>{{__('Pakeitimas')}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shorts as $shortCode)
                            <tr>
                                <td>{{ $shortCode->shortcode }}</td>
                                <td>{{ $shortCode->replace }}</td>
                                @can('update', $shortCode)

                                <td><a class="btn btn-success" href="{{ route('shorts.edit', $shortCode->id) }}">{{__('Atnaujinti')}}</a></td>
                                @endcan
                                <td>
                                    @can('delete', $shortCode)
                                    <form action="{{ route('shorts.destroy', $shortCode->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">{{__('Ištrinti')}}</button>
                                    </form>
                                    @endcan
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
