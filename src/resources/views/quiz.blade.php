@extends('layouts.app')

@section('content')
<main>
  <section class="question" id="js-getCount" data-count="{{ $count }}">
    @foreach($questions as $k => $q)
    <div class="question-inner">
      <h2 class="question-title">
        <span class="under">{{$k + 1}}. この地名はな</span>んて読む？
      </h2>
      <img src="{{ Storage::url($q->image) }}" width="650px">
      <ul id="question-list{{$k}}">
        @foreach($q['choices'] as $q_c)
        <li 
        @if($q_c['valid']==1)
        class="question-list-item-correct{{$k}}"
        @else 
        class="question-list-item-nonCorrect"
        @endif>
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