@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('default.confirmpresence')</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
  </div>
</div>
<form class="row g-3" method="post" action="{{ route('schedules.confirmed') }}">
  @csrf
  <div class="col-md-3">
    <label for="inputPhone" class="form-label">@lang('default.phone')*</label>
    <input name="phone" class="form-control" id="inputPhone" required>
  </div>
  <div class="col-md-3">
    <label for="inputDate" class="form-label">@lang('default.date')</label>
    <select name="schedule_id" id="inputDate" class="form-select">
        @foreach($schedules as $key => $option)
            <option value="{{ $option->id }}">{{ \Carbon\Carbon::parse($option->date)->format('d/m/Y') }}</option>
        @endforeach
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">@lang('default.save')</button>
  </div>
</form>
@endsection