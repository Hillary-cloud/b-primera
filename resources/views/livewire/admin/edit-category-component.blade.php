<div class="container mt-5">
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Edit Category</h3>
                    <span class="float-end"><a href="{{route('admin.categories')}}">All Categories</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <form action="" wire:submit.prevent="updateCategory()">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  wire:model="name" wire:keyup="generateSlug()">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control"  wire:model="slug">
                            @error('slug')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>