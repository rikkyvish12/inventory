<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="/">Inventory</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">All Material</a></li>
        <li class="{{ Request::is('category') || Request::is('category/*') ? 'active' : '' }}"><a
                href="{{ url('category') }}">Category</a></li>
        <li class="{{ Request::is('material') || Request::is('material/*') ? 'active' : '' }}"><a
                href="{{ url('material') }}">Material</a></li>
    </ul>

</nav>
