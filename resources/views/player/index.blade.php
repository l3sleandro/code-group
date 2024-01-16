@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@lang('default.players')</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('players.add') }}" class="btn btn-sm btn-primary">
        @lang('default.add')
      </a>
    </div>
  </div>
</div>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">@lang('default.name')</th>
        <th scope="col">@lang('default.phone')</th>
        <th scope="col" class="text-center">@lang('default.leval')</th>
        <th scope="col" class="text-center">@lang('default.goalkeeper')</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($players as $player)
      <tr>
        <td>{{ $player->name }}</td>
        <td>{{ $player->phone }}</td>
        <td class="text-center">{{ $player->level }}</td>
        <td class="text-center">
          @if($player->is_goalkeeper)
            <svg class="bi text-success" fill="currentColor"><use xlink:href="#circle-fill"/></svg>
          @else
            <svg class="bi text-danger" fill="currentColor"><use xlink:href="#circle-x-fill"/></svg>
          @endif
        </td>
        <td>
          <a href="{{ route('players.edit', ['id' => $player->id]) }}" class="btn btn-primary btn-sm" href="#" role="button">
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