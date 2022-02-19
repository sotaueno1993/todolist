@extends('layout')
@section('title', 'Todoリスト')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>ウエノのTODOリスト</h2>
      @if (session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
      @endif
      <table class="table table-striped">
          <tr>
              <th>記事番号</th>
              <th>タイトル</th>
              <th>日付</th>
              <th></th>
              <th></th>
          </tr>
          @foreach($todolists as $todolist)
          <tr>
              <td>{{ $todolist->id }}</td>
              <td><a href="/todolist/{{ $todolist->id }}">{{ $todolist->title }}</a></td>
              <td>{{ $todolist->updated_at }}</td>
              <td><button type="button" class="btn-primary" onclick="location.href='/todolist/edit/{{ $todolist->id }}'">編集</button></td>
              <form method="POST" action="{{ route('delete', $todolist->id)}}" onSubmit="return checkDelete()">
                  @csrf
              <td><button type="submit" class="btn-primary" onclick=>削除</button></td>
            </form>
          </tr>
          @endforeach
      </table>
  </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection('content')