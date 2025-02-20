<div class="card p-5">

    <div class="d-flex justify-content-between mb-3">
        <div>
            <h3>Contacts</h3>
        </div>
        <div>
            <div class="d-flex gap-2 align-items-center">
                <span>Search:</span>
                <input type="text" wire:model.live="search" class="form-control form-control-sm">
            </div>
        </div>
    </div>

    @if ($contacts->count() === 0)
        <div class="opacity-50">
            No contacts found
        </div>
    @else
        @foreach ($contacts as $contact)
            <div class="card bg-dark p-3 mb-1">
                <div class="row">
                    <div class="col">Name: {{ $contact->name }}</div>
                    <div class="col">Email: {{ $contact->email }}</div>
                    <div class="col">Phone: {{ $contact->phone }}</div>
                    <div class="col">
                        <a href="{{ route("contacts.edit", ['id' => $contact->id]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route("contacts.delete", ['id' => $contact->id]) }}" class="btn btn-sm btn-danger">Delete</a>                        
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            {{ $contacts->links() }}
        </div>
    @endif
</div>
