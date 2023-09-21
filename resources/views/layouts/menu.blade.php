
<li class="nav-item">
    <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Products</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('discountCodes.index') }}" class="nav-link {{ Request::is('discountCodes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Discount Codes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('fileManagers.index') }}" class="nav-link {{ Request::is('fileManagers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>File Managers</p>
    </a>
</li>
