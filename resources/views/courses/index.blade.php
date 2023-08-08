<x-layout>

    <x-slot:title>Lista Corsi</x-slot>

        <div class="container mt-4">
            <div class="row">
                <div class="col-8 mx-auto">

                    <table class="table shadow mt-3">
                        <div class="d-flex justify-content-between">
                            <h1>Lista corsi</h1>
                            <div>
                                <a href="{{ route('courses.create') }}">
                                    <button type="button" class="btn btn-outline-success">Aggiungi</button>
                                </a>
                            </div>
                        </div>

                        <x-flash-message />

                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Durata</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <th scope="row">{{ $course->id }}</th>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->duration }}h</td>
                                <td class="d-flex justify-content-end">
                                    <a class="me-3" href="{{ route('courses.edit', $course) }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Modifica</button>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-action="{{ route('courses.destroy', $course) }}">
                                        Elimina
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $courses->links() }}

                </div>
            </div>
        </div>

        <x-confirmation-modal :what="$what" />

</x-layout>