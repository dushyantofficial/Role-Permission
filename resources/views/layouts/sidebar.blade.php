<!-- Sidebar menu-->
@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
<aside class="app-sidebar">
    <ul class="app-menu">
        <li><a class="app-menu__item {{ Request::is('home*') ? 'active' : '' }}" href="{{route('home')}}"><i
                    class="app-menu__icon fa fa-dashboard"></i><span
                    class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item {{ Request::is('users*') ? 'active' : '' }}" href="{{route('users.index')}}"><i
                    class="fa fa-users"></i>&nbsp;&nbsp;<span class="app-menu__label">Users</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('role*') ? 'active' : '' }}" href="{{route('roles.index')}}"><i
                    class="fa fa-user"></i>&nbsp;&nbsp;<span class="app-menu__label">Roles</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('products*') ? 'active' : '' }}" href="{{route('products.index')}}"><i
                    class="fa fa-product-hunt"></i>&nbsp;&nbsp;<span class="app-menu__label">Products</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('permission*') ? 'active' : '' }}"
               href="{{route('permission.index')}}"><i
                    class="fa fa-lock"></i>&nbsp;&nbsp;<span class="app-menu__label">Permission</span></a>
        </li>

        <li><a class="app-menu__item {{ Request::is('resumes*') ? 'active' : '' }}" href="{{route('resumes.index')}}">
                <i class="fa fa-file"></i>&nbsp;&nbsp;<span class="app-menu__label">Resume</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('professional_skills*') ? 'active' : '' }}"
               href="{{route('professional_skills.index')}}">
                <i class="fa fa-laptop"></i>&nbsp;&nbsp;<span class="app-menu__label">Professional Skills</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('work_experiences*') ? 'active' : '' }}"
               href="{{route('work_experiences.index')}}"><i
                    class="fa fa-level-up"></i>&nbsp;&nbsp;<span class="app-menu__label">Work Experience</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('educations*') ? 'active' : '' }}"
               href="{{route('educations.index')}}">
                <i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;<span class="app-menu__label">Education</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('projects*') ? 'active' : '' }}" href="{{route('projects.index')}}"><i
                    class="fa fa-tasks"></i>&nbsp;&nbsp;<span class="app-menu__label">Project</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('course*') ? 'active' : '' }}" href="{{route('course.index')}}"><i
                    class="fa fa-star"></i>&nbsp;&nbsp;<span class="app-menu__label">Course</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('payment*') ? 'active' : '' }}" href="{{route('payment.index')}}"><i
                    class="fa fa-credit-card"></i>&nbsp;&nbsp;<span class="app-menu__label">Payment</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('history_payment*') ? 'active' : '' }}" href="{{route('payment-history')}}"><i
                    class="fa fa-history"></i>&nbsp;&nbsp;<span class="app-menu__label">Payment History</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('refund_payment_history*') ? 'active' : '' }}" href="{{route('refund-payment-history')}}"><i
                    class="fa fa-undo"></i>&nbsp;&nbsp;<span class="app-menu__label">Refund Payment History</span></a>
        </li>
        <li><a class="app-menu__item {{ Request::is('backup_download*') ? 'active' : '' }}" href="{{route('backup-download')}}"><i
                    class="fa fa-hdd-o"></i>&nbsp;&nbsp;<span class="app-menu__label">Backup</span></a>
        </li>

    </ul>
</aside>
