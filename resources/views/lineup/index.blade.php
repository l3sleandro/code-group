@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('default.lineups')</h1>
</div>

<div class="row align-items-center ">
  
  <div class="col-lg-3 col-md-12 mx-auto mb-5">
    <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="get" action="{{ route('lineups.list') }}">
    @csrf
      <div class="form-floating mb-3">
        <select name="schedule_id" id="inputDate" class="form-select">
          <option selected></option>
          @foreach($schedules as $key => $option)
            <option value="{{ $option->id }}" @if($option->id == request('schedule_id')) selected @endif>{{ \Carbon\Carbon::parse($option->date)->format('d/m/Y') }} - @lang('default.confirmations') ({{ $option->confirmed }})</option>
          @endforeach
        </select>
        <label for="inputDate">@lang('default.schedule')</label>
      </div>

      <div class="form-floating mb-3">
        <input name="nplayers" type="tel" class="form-control" id="inputNplayers" value="{{ request('nplayers') }}">
        <label for="inputNplayers">@lang('default.nplayers')</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">@lang('default.generate')</button>
    </form>
  </div>
  <div class="col-lg-9 text-center text-lg-start">
      <div class="row align-items-center p-3">
        @foreach($times as $key => $list)
          <div class="card col-lg-4 mb-3">
            <div class="card-header">@lang('default.team') #{{ $key + 1}}</div>
            <ul class="list-group list-group-flush">
              @foreach($list as $key2 => $pl)
                <li class="list-group-item">
                  {{$pl->name}}

                  @if($pl->is_goalkeeper == 1) <span class="badge text-bg-success">@lang('default.goalkeeper')</span> @endif                  
                  <span class="badge text-bg-warning">@lang('default.leval') = {{ $inputLevel[$pl->level] }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        @endforeach
      </div>
  </div>
</div>
@endsection