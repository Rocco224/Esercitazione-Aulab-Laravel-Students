<x-layout>

    <x-slot:title>Lista Studenti</x-slot>

        <div class="container mt-4">
            <div class="row">
                <div class="col-8 mx-auto">

                    <table class="table shadow mt-3">

                        <div class="d-flex justify-content-between">
                            <h1>Lista studenti</h1>
                            <div>
                                <a href="{{ route('students.create') }}">
                                    <button type="button" class="btn btn-outline-success">Aggiungi</button>
                                </a>
                            </div>
                        </div>

                        <x-flash-message />

                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Cognome</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <th scope="row">{{ $student->id }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->surname }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('students.show', $student) }}">
                                        <button type="button" class="btn btn-sm btn-outline-primary">Info</button>
                                    </a>
                                    <a class="mx-3" href="{{ route('students.edit', $student) }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Modifica</button>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-action="{{ route('students.destroy', $student) }}">
                                        Elimina
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $students->links() }}

                </div>
            </div>
        </div>

        <x-confirmation-modal :what="$what" />

</x-layout>