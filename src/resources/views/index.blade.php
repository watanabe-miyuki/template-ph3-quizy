@extends('layouts.app')

@section('content')
  クイズの選択
  @foreach($big_questions as $b_q)
  <a href="{{ route('quiz', ['id'=>$b_q->id]) }}" class="d-block">{{$b_q->name}}</a>
  @endforeach
  <a href="{{ route('admin.login.login') }}" class="d-block">管理者画面はこちら</a>
@endsection
