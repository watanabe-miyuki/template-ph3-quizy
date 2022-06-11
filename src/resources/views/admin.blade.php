@extends('layouts.app')

@section('content')
<a href="/add" class="d-block">大門追加</a>

@foreach ($big_questions as $b_q)
<p>・{{$b_q['name']}}</p>
@foreach ($b_q['questions'] as $q)
    <img src="{{ Storage::url($q->image) }}" width="25%">
@endforeach
<a href="/admin/add/{{$b_q['id']}}">設問追加</a>
<a href="/admin/delete/{{$b_q['id']}}">大門削除</a>
@endforeach
@endsection