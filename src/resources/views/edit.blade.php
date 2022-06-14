@extends('layouts.app')

@section('content')
クイズの編集
<div>
<img src="{{ Storage::url($question->image) }}" width="300px">
</div>
<form action="{{ route('update', ['id' => $question['id']]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <!-- choices -->
  <div class="form-group">
    <label for="subject">
      選択肢1
    </label>
    <input class="form-control" name="choices[0]" type="text" id="choice" value="{{$choices[0]['name']}}">
    <input name="valid" value="0" type="radio" {{ $choices[0]['valid'] == 1 ? "checked" : "" }}>
  </div>
  <div class="form-group">
    <label for="subject">
      選択肢2
    </label>
    <input class="form-control" name="choices[1]" type="text" id="choice" value="{{$choices[1]['name']}}">
    <input name="valid" value="1" type="radio" {{ $choices[1]['valid'] == 1 ? "checked" : "" }}>
  </div>
  <div class="form-group">
    <label for="subject">
      選択肢3
    </label>
    <input class="form-control" name="choices[2]" type="text" id="choice" value="{{$choices[2]['name']}}">
    <input name="valid" value="2" type="radio" {{ $choices[2]['valid'] == 1 ? "checked" : "" }}>
  </div>
  <!-- end choices -->

  <input type="submit" value="編集">
</form>
@endsection