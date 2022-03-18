<header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand m-0" href="{{ route('home') }}">
                {{ config('app.name') ?? 'Laravel workflow' }}
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a
                            href="{{ route('pull-request.index') }}"
                            class="nav-link @if(route('pull-request.index') === url()->current()) active @endif">
                            {{ __('Pull Requests') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route('workflow-upload.index') }}"
                            class="nav-link @if(route('workflow-upload.index') === url()->current()) active @endif">
                            {{ __('Workflow uploads') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
