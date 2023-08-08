<x-layout>

    <x-slot:title>Crea Corso</x-slot>

        <div class="container mt-4">
            <div class="row">
                <div class="col-6 mx-auto">

                    <div class="d-flex justify-content-between">
                        <h1>Crea corso</h1>
                        <a href="{{ route('courses.index') }}">
                            <button type="button" class="btn btn-outline-dark">Indietro</button>
                        </a>
                    </div>

                    <form action="{{ route('courses.store') }}" method="POST" class="bg-white mt-3 p-3 shadow">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @error('name') <span class="small text-danger"> {{ $message }} </span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Durata</label>
                            <input type="text" class="form-control" name="duration" id="duration" value="{{ old('duration') }}">
                            @error('duration') <span class="small text-danger"> {{ $message }} </span> @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success">Crea</button>
                    </form>

                </div>
            </div>
        </div>

</x-layout>