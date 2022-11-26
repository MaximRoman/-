@extends('layouts.app')

@section('content')
    <div class="card rounded-0 bg-gray border-0">
        <div class="card-body">
            <div class="books">
                @for ($i = 0; $i < 15; $i++)
                    <h1 >SS{{$i}}</h1>
                @endfor
            </div>
        </div>
    </div>
@endsection
