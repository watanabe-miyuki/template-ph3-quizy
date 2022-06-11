@extends('layouts.app')

@section('content')
  クイズ写真のアップロード
  <form action="{{ route('store', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="file" name="img_path">
<input type="submit" value="アップロード">
</form>
@endsection