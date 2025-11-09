<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand justify-content-center mb-3 mt-3">
        <a href="index.html" class="app-brand-link gap-2">
            <div style="display: flex; justify-content: center; align-items: center; width: 70px; height: 70px; background-color: #007bff; border-radius: 50%;">
                <span style="font-size: 36px; font-weight: bold; color: #ffffff;">M</span>
            </div>
        </a>
    </div>
    <div class="app-brand justify-content-center text-center">
        <a href="/login" class="app-brand-link" style="text-decoration: none;">
            <span class="app-brand-text demo text-body fw-bolder"
                style="font-size: 18px; color: #000000; text-transform: none !important;">
                MemberBalance
            </span>

        </a>
    </div>
    <!-- Digital Clock -->
    <div id="digital-clock" class="text-center my-2"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- Dashboard --}}
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        {{-- {-- Data Member --} --}}
        <li class="menu-item {{ Request::is('datamember*') ? 'active' : '' }}">
            <a href="/datamember" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Analytics">Data Member</div>
            </a>
        </li>

        {{-- Riwayat --}}
        <li class="menu-item {{ Request::is('transaksi') ? 'active' : '' }}">
            <a href="/transaksi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-history"></i>
                <div data-i18n="Analytics">Riwayat Transaksi</div>
            </a>
        </li>

        {{-- User --}}
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Hak Akses</span></li>
        <li class="menu-item {{ Request::is('user*') ? 'active' : '' }}">
            <a href="/user" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">User</div>
            </a>
        </li>
    </ul>
</aside>
