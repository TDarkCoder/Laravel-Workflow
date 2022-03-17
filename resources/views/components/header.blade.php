<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand m-0" href="{{route('home')}}">
                {{ config('app.name') ?? 'Laravel workflow' }}
            </a>
            <div class="d-flex">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"/>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if(route('pull-request.index') === url()->current()) active @endif"
                               href="{{ route('pull-request.index') }}">
                                Pull Requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(route('workflow.index') === url()->current()) active @endif"
                               href="{{ route('workflow.index') }}">
                                Workflow uploads
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
