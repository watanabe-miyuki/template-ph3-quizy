@extends('layouts.app')

@section('content')
クイズの編集
<form action="{{ route('store', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="img_path">

  <!-- choices -->
  <div class="form-group">
    <label for="subject">
      選択肢1
    </label>
    <input class="form-control" name="choices[0]" type="text" id="choice">
    <input name="valid" value="0" type="radio">
  </div>
  <div class="form-group">
    <label for="subject">
      選択肢2
    </label>
    <input class="form-control" name="choices[1]" type="text" id="choice">
    <input name="valid" value="1" type="radio">
  </div>
  <div class="form-group">
    <label for="subject">
      選択肢3
    </label>
    <input class="form-control" name="choices[2]" type="text" id="choice">
    <input name="valid" value="2" type="radio">
  </div>
  <!-- end choices -->

  <input type="submit" value="追加">
</form>
@endsection