@php
use App\Models\User;
$user = Auth::user();

@endphp
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        Management
    </a>
    @if (in_array(@$user->group_id,[User::ADMINISTRATOR , User::VP]))
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('management.setting') }}">
            setting
        </a>
    </div>
    @else
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('management.profile') }}">
            profile setting
        </a>
    </div>
    @endif
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        Survey
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('survey.create') }}">
            Survey Create
        </a>
        @if (in_array(@$user->group_id,[User::ADMINISTRATOR , User::VP]))
        <a class="dropdown-item" href="{{ route('survey.list') }}">
            Survey list
        </a>
        <a class="dropdown-item" href="{{ route('survey.template-list') }}">
            Survey Template List
        </a>
        @endif
    </div>


</li>
