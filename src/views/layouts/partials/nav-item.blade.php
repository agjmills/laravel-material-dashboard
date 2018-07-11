<li class="nav-item">
  @if (array_has($item, 'form_method'))
    <a class="nav-link" href="{{ route(array_get($item, 'route'), array_get($item, 'parameters')) }}" data-method="{{ array_get($item, 'form_method') }}" data-token="{{ csrf_token() }}">
  @elseif (array_has($item, 'route'))
    <a class="nav-link" href="{{ route(array_get($item, 'route'), array_get($item, 'parameters')) }}">
  @elseif (array_has($item, 'link'))
    <a class="nav-link" href="{{ array_get($item, 'link') }}">
  @endif
  @if (array_has($item, 'icon'))
    <i class="fa {{ array_get($item, 'icon') }}"></i>
  @endif
  @if ((array_get($item, 'route', false) === false)  && (array_get($item, 'link', false) === false))
    <p class="nav-link">{{ array_get($item, 'text') }}</p>
  @else
    <p>{{ array_get($item, 'text') }}</p>
  @endif
  @if (array_get($item, 'route') || array_get($item, 'link'))
    </a>
  @endif
</li>