 <a {{ $attributes }}
     class="{{ request()->fullUrlIs(url($href)) ? 'active' : 'link-dark' }} nav-link  d-flex align-items-center gap-3 sidebar__link">
     {{ $slot }}
 </a>
