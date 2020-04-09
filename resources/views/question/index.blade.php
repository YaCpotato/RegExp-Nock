@extends('layouts.app')
@section('content')
<div class="container ops-main" id="app">
<div class="row">
  <div class="col-md-12">
    <div style="margin:10px;"><a href="/question/create" class="btn btn-primary">新規作成</a></div>
  </div>
</div>
<div class="row">
  <div class="col-md-9 col-md-offset-1" style="margin-right:30px;">
    <table class="table text-center">
      <tr>
        <th class="text-center">question</th>
      </tr>
      @foreach($questions as $question)
      <tr>
        <td>
          <span>{{ $question->content }}</span>
        </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection