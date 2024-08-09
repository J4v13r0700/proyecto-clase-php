@extends('ejemplo-blade.main')

@section('title', 'Página de Ejemplo')

@section('content')
    
    @if ($orden->id > 1)
        <p>Nueva Orden</p>
    @elseif(is_null($orden))
        <p>Orden inexistente</p>
    @endif

    @if (!is_null($orden))
        <div>
            <span>{{ $orden->numero_orden }}</span>
        </div>

        <ul>
        @foreach ($pizzas as $pizza )
            <li><span>Pizza {{ $pizza->name }}</span></li>
            <li><span>Tamano {{ $pizza->size }}</span></li>

            @foreach ($pizza->ingredientes as $ingrediente )
                <input type="checkbox" name="{{ $ingrediente->name }}">{{$ingrediente->name}} <br/>
            @endforeach

        @endforeach
        </ul>
    @endif




@endsection