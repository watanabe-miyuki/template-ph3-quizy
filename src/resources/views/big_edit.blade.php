@extends('layouts.admin')

@section('content')
@foreach ($big_questions as $b_q)
<form action="{{ route('big_update', ['id' =>  $b_q['id']]) }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="m-5 d-flex">
    <div class="d-flex"><input class="form-control" name="order" type="number" value="{{$b_q['order']}}" style="width:50px;">番　</div>
    <div><input class="form-control" name="name" type="text" value="{{$b_q['name']}}"></div>
    <input type="submit" name="update" value="編集完了">　
    <input type="submit" name="delete" value="削除">
  </div>
</form>
  @endforeach
<h3 class="ml-5 mt-5">新規追加</h3>
  <form action="{{ route('big_store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="ml-5 mt-2 d-flex">
      <div class="d-flex"><input class="form-control" name="order" type="number" style="width:50px;">番　</div>
      <div><input class="form-control" name="name" type="text" placeholder="タイトルを入力"></div>
      <input type="submit" value="追加">
    </div>
  </form>

  @endsection