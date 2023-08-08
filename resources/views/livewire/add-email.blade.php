<div>
    <div class="form-check mb-3">
        <input wire:model="showEmail" class="form-check-input" type="checkbox" id="showEmail">
        <label class="form-check-label" for="showEmail">
            Aggiungi un'altra email
        </label>
    </div>

    @if ($showEmail)
    <div class="mb-3">
        <label for="email" class="form-label">Email {{$counter++}}</label>
        <input type="email" class="form-control" name='emails[]' id="email" value="{{ old('email') }}">
    </div>

    <livewire:add-email :counter="$counter"/>
    @endif
</div>