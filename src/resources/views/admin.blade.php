@extends('layouts.app')

@section('content')
<a href="/add" class="d-block">大門追加</a>
@foreach ($questions as $q)
    
    <img src="{{ Storage::url($q->image) }}" width="25%">
@endforeach
@endsection