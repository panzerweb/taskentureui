{{-- 
============================================================================
                           REUSABLE NAVLINK BEHAVIOR
It allows the link have a behavior to which is an active link for the moment
============================================================================
--}}

@props(['active' => false])

<a class="{{ $active ? 'text-warning' : 'text-light' }} nav-link"
   aria-current="{{ $active ? 'page' : 'false' }}"
   {{ $attributes }}>
   {{ $slot }}
</a>
