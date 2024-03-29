<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a href="{{ route('players.list') }}" class="nav-link d-flex align-items-center gap-2">
            @lang('default.players')
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('schedules.list') }}" class="nav-link d-flex align-items-center gap-2">
            @lang('default.schedule')
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('lineups.list') }}" class="nav-link d-flex align-items-center gap-2">
            @lang('default.lineups')
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>