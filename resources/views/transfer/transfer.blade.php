@extends('layouts.app')

@section('title', 'Transfers')

@section('content')

    {{-- transfer cards --}}
    <div class="row mx-1">
        @if (Auth::user()->type == 'admin')
            @include('transfer.adminView')
            
        @else
            @include('transfer.clientView')
        @endif
    </div>

@endsection
