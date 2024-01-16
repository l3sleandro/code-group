@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('default.schedule')</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('schedules.confirmed') }}" class="btn btn-sm btn-success">
        @lang('default.confirmpresence')
      </a>
      <a href="{{ route('schedules.add') }}" class="btn btn-sm btn-info">
        @lang('default.schedulesadd')
      </a>
    </div>
  </div>
</div>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">@lang('default.date')</th>
        <th scope="col">@lang('default.situation')</th>
        <th scope="col" class="text-center">@lang('default.confirmations')</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($schedules as $schedule)
      <tr>
        <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
        <td>{{ $situations[$schedule->situation] }}</td>
        <td class="text-center">{{ $schedule->confirmed }}</td>
        <td>
          <a href="{{ route('schedules.edit', ['id' => $schedule->id]) }}" class="btn btn-primary btn-sm" href="#" role="button">
            <svg class="bi" fill="currentColor">
              <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
            </svg>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection