@extends('../layouts.admin')

@section('content')
<!-- <a href="/add" class="d-block m-3">大門追加</a> -->

@foreach ($big_questions as $b_q)
<div class="m-5">
<h3>・{{$b_q['name']}}　　　　
<a href="/admin/add/{{$b_q['id']}}">設問追加</a>
<!-- <a href="/admin/delete/{{$b_q['id']}}">大門削除</a> -->
</h3>
<div class="d-flex">
    @foreach ($b_q['questions'] as $q)
    <div class="m-2">
        <img src="{{ Storage::url($q->image) }}" width="200px">
        <div>
            <a href="/admin/edit/{{$q['id']}}">編集</a>
            <a href="/admin/delete/{{$q['id']}}">削除</a>
        </div>
    </div>
    @endforeach
</div>
</div>
@endforeach
@endsection