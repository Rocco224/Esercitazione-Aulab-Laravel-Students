@auth
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand">{{ config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('students.index') }}">Studenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('courses.index') }}">Corsi</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li>
          <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-sm btn-outline-light" type="submit">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endauth