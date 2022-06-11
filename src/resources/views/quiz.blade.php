@extends('layouts.app')

@section('content')
  @foreach($questions as $q)
  <a href="/quiz/{{$q->id}}" class="d-block">{{$q->image}}</a>
  @foreach($q['choices'] as $q_c)
  {{$q_c['name']}}
  @endforeach
  @endforeach
@endsection
