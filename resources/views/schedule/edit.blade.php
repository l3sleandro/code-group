@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('default.schedulesadd')</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
  </div>
</div>
<form class="row g-3" method="post" action="{{ route('schedules.edit', ['id' => $schedule->id]) }}">
  @csrf
  <div class="col-md-3">
    <label for="inputDate" class="form-label">@lang('default.date')*</label>
    <input name="date" class="form-control" id="inputDate" value="{{ old('name', \Carbon\Carbon::parse($schedule->date)->format('d/m/Y')) }}" required>
  </div>
  <div class="col-md-3">
    <label for="inputSituation" class="form-label">@lang('default.situation')</label>
    <select name="situation" id="inputSituation" class="form-select">
        @foreach($inputSituations as $key => $option)
            <option value="{{ $key }}" @if($key == $schedule->situation) selected @endif>{{ $option }}</option>
        @endforeach
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">@lang('default.save')</button>
  </div>
</form>
@endsection