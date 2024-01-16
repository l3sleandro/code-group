@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('default.playersedit')</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
  </div>
</div>
<form class="row g-3" method="post" action="{{ route('players.edit', ['id' => $player->id]) }}">
  @csrf
  <div class="col-md-6">
    <label for="inputName" class="form-label">@lang('default.name')*</label>
    <input name="name" class="form-control" id="inputName" value="{{ old('name', $player->name) }}" required>
  </div>
  <div class="col-md-4">
    <label for="inputPhone" class="form-label">@lang('default.phone')*</label>
    <input name="phone" class="form-control" id="inputPhone" value="{{ old('phone', $player->phone) }}" required>
  </div>
  <div class="col-md-4">
    <label for="inputLevel" class="form-label">@lang('default.leval')</label>
    <select name="level" id="inputLevel" class="form-select">
        @foreach($inputLevel as $key => $option)
            <option value="{{ $key }}" @if($key == $player->level) selected @endif>{{ $option }}</option>
        @endforeach
    </select>
  </div>
  <div class="col-md-4">
    <label for="inputGoalie" class="form-label">@lang('default.goalkeeper') ?</label>
    <select name="is_goalkeeper" id="inputGoalie" class="form-select">
        @foreach($inputBoolean  as $key => $option)
            <option value="{{ $key }}" @if($key == $player->is_goalkeeper) selected @endif >{{ $option }}</option>
        @endforeach
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">@lang('default.save')</button>
  </div>
</form>
@endsection