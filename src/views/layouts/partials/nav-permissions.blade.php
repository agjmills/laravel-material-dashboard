@if (array_has($item, 'permissions', false))
  @can(array_get($item, 'permissions.action'), array_get($item, 'permissions.resource'))
    @include('MaterialDashboard::partials.nav-item')
  @endcan
@else
  @include('MaterialDashboard::partials.nav-item')
@endif