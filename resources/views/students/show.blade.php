<x-layout>

    <x-slot:title>{{ $student->name }}  {{ $student->surname }}</x-slot>

        <div class="container mt-3">
            <div class="row">
                <div class="col-6 mx-auto">

                    <div class="d-flex justify-content-between">
                        <h1>Info studente</h1>
                        <a href="{{ route('students.index') }}">
                            <button type="button" class="btn btn-outline-dark">Indietro</button>
                        </a>
                    </div>

                    <x-flash-message />

                    <div class="card mt-3 shadow">
                        <div class=" card-body">
                            <h5 class="card-title">{{ $student->name }}  {{ $student->surname }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $student->city }}</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item fw-semibold">Email</li>
                                @foreach($student->emails as $studentEmail)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ $studentEmail->email }}</span>
                                    <form action="{{ route('students.destroyEmail', $studentEmail->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item fw-semibold">Corsi</li>
                                @foreach($student->courses as $course)
                                <li class="list-group-item">{{ $course->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-end p-3">
                            <form action="{{ route('students.emailto', $student) }}" method="post">
                                @csrf
                                @if($hasCourse)
                                <button type="submit" class="btn btn-outline-primary">Invia elenco corsi</button>
                                @else
                                <span class="small text-danger">
                                    lo studente non è iscritto a nessun corso
                                </span>
                                @endif

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</x-layout>