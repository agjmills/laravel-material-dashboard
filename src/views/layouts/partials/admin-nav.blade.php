<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-tachometer"></i>
            <p>Dashboard</p>
        </a>
    </li>
</ul>

<ul class="nav">
    <li class="nav-item">
        <p class="nav-link">Content Management</p>
    </li>
    @can('manage', \App\Page::class)
    <li class="nav-item">
        <a class="nav-link" id="admin-nav-pages-link" href="{{ route('admin.content.index', 'pages') }}">
            <i class="fa fa-file-text"></i>
            <p>Pages</p>
        </a>
    </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link" id="admin-nav-articles-link"  href="#">
            <i class="fa fa-newspaper-o"></i>
            <p>Articles</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="admin-nav-articles-link"  href="{{ route('admin.category.index') }}">
            <i class="fa fa-list"></i>
            <p>Categories</p>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="admin-nav-authors-link" href="{{ route('admin.author.index') }}">
            <i class="fa fa-vcard"></i>
            <p>Authors</p>
        </a>
    </li>

</ul>

@can('manage', \App\User::class)
<ul class="nav">
    <li class="nav-item">
        <p class="nav-link">User Management</p>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="admin-nav-user-management-link" href="{{ route('admin.users.index') }}">
            <i class="fa fa-users"></i>
            <p>Manage Users</p>
        </a>
    </li>
</ul>
@endcan

<ul class="nav">
    <li class="nav-item">
        <p class="nav-link">Account Settings</p>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="admin-nav-change-password-link"  href="{{ route('admin.change-password.index') }}">
            <i class="fa fa-key"></i>
            <p>Change Password</p>
        </a>
    </li>
    <li class="nav-item">
        {{ Form::open(['route' => 'logout', 'method' => 'post', 'id' => 'logoutForm']) }}
            {{ csrf_field() }}
            <a name="logout-button" onclick="document.getElementById('logoutForm').submit();" href="#" class="nav-link nav-link-submit">
                <i class="fa fa fa-sign-out"></i>
                <p>Logout</p>
            </a>
        {{ Form::close() }}
    </li>
</ul>
