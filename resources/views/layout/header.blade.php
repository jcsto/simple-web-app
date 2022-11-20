<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/"><i class="fa fa-house"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link {{ (url()->current() == route('company.list')) ? 'active' : ''}}" href="{{ route('company.list') }}">Companies List</a>
            <a class="nav-item nav-link {{ (url()->current() == route('company.add')) ? 'active' : ''}}" href="{{ route('company.add') }}">Create Company</a>
            <a class="nav-item nav-link {{ (url()->current() == route('employee.list')) ? 'active' : ''}}" href="{{ route('employee.list') }}">Employees List</a>
        </div>
    </div>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif