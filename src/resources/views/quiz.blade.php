@extends('layouts.app')

@section('content')
<main>
  <section class="question">
    @foreach($questions as $k => $q)
    <div class="question-inner">
      <h2 class="question-title">
        <span class="under">{{$q['id']}}. この地名はな</span>んて読む？
      </h2>
      <img src="{{ Storage::url($q->image) }}" width="650px">
      <ul id="question-list{{$q['id']}}">
        @foreach($q['choices'] as $q_c)
        <li class="question-list-item-nonCorrect" value="{{$q_c['valid']}}">
          {{$q_c['name']}}
        </li>
        @endforeach
      </ul>
      <!-- ここから -->
      <div class="question-correctBox{{$k}}">
        <h3<span class="question-correctBox-title">正解！</span></h3>
          <p class="question-correctBox-description">正解は「{{$q['answer']['name']}}」です！</p>
      </div>
      <div class="question-nonCorrectBox{{$k}}">
        <h3><span class="question-nonCorrectBox-title">不正解！</span></h3>
        <p class="question-correctBox-description">正解は「{{$q['answer']['name']}}」です！</p>
      </div>
    </div>
    <!-- ここまで -->
    </div>
    @endforeach
  </section>
</main>
@endsection