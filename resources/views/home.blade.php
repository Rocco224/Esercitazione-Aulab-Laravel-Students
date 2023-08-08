<x-layout>

    <x-slot:title>Home</x-slot>

        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto mt-4">

                    <div class="text-center">
                        <h1>Benvenuto @auth {{ auth()->user()->name }} @endauth</h1>
                        <p>Cosa vuoi fare?</p>
                    </div>

                    <div class="d-flex justify-content-evenly mt-4">
                        <a href="{{ route('students.index') }}">
                            <button class="btn btn-lg btn-outline-dark fs-3">
                                Gestione studenti
                            </button>
                        </a>
                        <a href="{{ route('courses.index') }}">
                            <button class="btn btn-lg btn-outline-dark fs-3">
                                Gestione corsi
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>

</x-layout>