@extends('layout')
@section('title', 'Todo詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>{{ $todolist->title }}</h2>
      <span>作成日:{{ $todolist->created_at }}</span>
      <span>更新日:{{ $todolist->updated_at }}</span>
      <p>{{ $todolist->content }}</p>     
  </div>
</div>
@endsection('content')