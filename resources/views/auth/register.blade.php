<x-layout>

    <x-slot:title>Registrati</x-slot>

        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-6">

                    <h1 class="text-center">Registrati</h1>

                    <form class="mt-3 bg-white p-3 shadow" action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        @error('name') <span class="small text-danger">{{ $message }}</span> @enderror
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        @error('email') <span class="small text-danger">{{ $message }}</span> @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        @error('password') <span class="small text-danger">{{ $message }}</span> @enderror
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Conferma password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                        @error('password_confirmation') <span class="small text-danger">{{ $message }}</span> @enderror
                        <div class="mt-4">
                            <button type="submit" class="btn btn-outline-dark">Login</button>
                        </div>
                        <p class="mt-4 text-center">Hai gia' un account? <a href="/login">Accedi</a></p>
                    </form>



                </div>
            </div>
        </div>

</x-layout>