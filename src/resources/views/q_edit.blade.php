@extends('../layouts.admin')

@section('content')
<h3 class="m-5">
    {{ $big_questions['name'] }}
</h3>
@foreach ($questions as $q)
<form action="{{ route('q_update', ['id' =>  $q['id']]) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="m-5 d-flex">
        <div class="d-flex"><input class="form-control" name="order" type="number" value="{{$q['order']}}"
                style="width:60px;">番　</div>
        <div class="m-2 d-flex">
            <img src="{{ Storage::url($q->image) }}" width="200px">
            <div>
                @for ($i = 0; $i < 3; $i++)
                    <div class="form-group d-flex m-2">
                    <div for="subject" style="width:100px;">
                        選択肢{{ $i + 1 }}
                    </div>
                    <input class="form-control" name="choices[{{$i}}]" type="text" id="choice" value="{{$q['choices'][$i]['name']}}">
                    <input class="m-3" name="valid" value="{{ $i }}" type="radio" {{ $q['choices'][$i]['valid']==1 ? "checked" : "" }}>
                    </div>
                @endfor
            </div>
        </div>
        <div class="m-3">
            <div class="m-3">
                <input type="submit" name="update" value="編集">　
            </div>
            <div class="m-3">
                <input type="submit" name="delete" value="削除">
            </div>
        </div>
    </div>
</form>
@endforeach
<h3 class="ml-5 mt-5">新規追加</h3>
<form action="{{ route('store', ['id' =>  $id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="ml-5 mt-2 d-flex">
        <div class="d-flex"><input class="form-control" name="order" type="number" style="width:60px;">番　</div>
        <div class="m-2 d-flex">
            <input type="file" name="img_path" style="width:200px;">
            <div>
                @for ($i = 0; $i < 3; $i++) <div class="form-group d-flex m-2">
                    <div for="subject" style="width:100px;">
                        選択肢{{ $i + 1 }}
                    </div>
                    <input class="form-control" name="choices[{{$i}}]" type="text" id="choice">
                    <input class="m-3" name="valid" value="{{ $i }}" type="radio">
                </div>
                @endfor
            </div>
        </div>
        <div class="m-3">
            <div class="m-3">
                <input type="submit" name="update" value="追加">　
            </div>
        </div>
    </div>
</form>
@endsection