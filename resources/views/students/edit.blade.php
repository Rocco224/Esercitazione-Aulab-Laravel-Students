<x-layout>

    <x-slot:title>Modifica Studente</x-slot>

        <div class="container mt-4">
            <div class="row">
                <div class="col-6 mx-auto">

                    <div class="d-flex justify-content-between">
                        <h1>Modifica studente</h1>
                        <a href="{{ route('students.index') }}">
                            <button type="button" class="btn btn-outline-dark">Indietro</button>
                        </a>
                    </div>

                    <form action="{{ route('students.update', $student) }}" method="POST" class="bg-white mt-3 p-3 shadow">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $student->name) }}">
                            @error('name') <span class="small text-danger"> {{ $message }} </span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Cognome</label>
                            <input type="text" class="form-control" name="surname" id="surname" value="{{ old('surname',  $student->surname) }}">
                            @error('surname') <span class="small text-danger"> {{ $message }} </span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Città</label>
                            <input type="text" class="form-control" name="city" id="city" value="{{ old('city', $student->city) }}">
                            @error('city') <span class="small text-danger"> {{ $message }} </span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="courses" class="form-label">Corsi</label>
                            @foreach($courses as $course)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $course->id }}" name="courses[]" id="course" @checked($student->courses->contains($course->id))>
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $course->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @foreach($student->emails as $studentEmail)
                        <div class="mb-3">
                            <label for="email" class="form-label"> Email {{ $counter++ }}</label>
                            <input type="email" class="form-control" name='emails[]' id="email" value="{{ old('email', $studentEmail->email) }}">
                        </div>
                        @endforeach
                        <livewire:add-email :counter="$counter" />
                        <button type="submit" class="btn btn-outline-secondary">Modifica</button>
                    </form>

                </div>
            </div>
        </div>

</x-layout>