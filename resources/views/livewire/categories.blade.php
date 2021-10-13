<div>
    <form wire:submit.prevent="addCategory">
        <input
            wire:model="name"
            type="text"
            name="name"
            value="{{old('name')}}"
            class="form-group"
            placeholder="Name">
        <button class="btn btn-primary">Add Category</button>

        @error('name')
            <div class="alert alert-danger">
                <span class="error">{{ $message }}</span>
            </div>
        @enderror

    </form>

    <ul wire:sortable="updateCategoriesOrder">
        <div>
            @if (session()->has('message'))
            <div class="alert alert-primary" role="alert"">
                {{ session('message') }}
            </div>
            @endif
        </div>

        <br>
        @forelse ($categories as $category)
            <div wire:sortable.item="{{ $category->id }}" wire:key="{{ $category->id }}">
                <div class="row my-2" style="cursor: pointer">
                    <img src="/images/drag-icon.png"width="20">
                    <div class="ml-4">
                        <h4 wire:sortable.handle>{{ $category->name }}</h4>
                    </div>
                    <div class="ml-4">
                         <button class="btn btn-danger" wire:click="removeCategory({{ $category->id }})">Delete x</button>
                    </div>
                </div>
            </div>
        @empty
            <div>No categories found.</div>
        @endforelse
    </ul>
    <br>
    <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Back to dashboard</a>
</div>
