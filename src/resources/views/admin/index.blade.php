@extends('../layouts.admin')

@section('content')
@foreach ($big_questions as $b_q)
<div class="m-5 d-flex">
    <h4>・{{$b_q['name']}}　　　　</h4>
    <h5>
        <a href="{{ route('q_edit', ['id'=>$b_q->id]) }}">設問編集</a>
    </h5>

</div>
@endforeach
<h4 class="m-5"><a href="{{ route('big_edit')}}" >タイトル編集</a>
</h4>
@endsection