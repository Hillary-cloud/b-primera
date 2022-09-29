<div>
    <div class="container mt-5">
        <div class="row">
            <div class="container">          
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-start">Edit Photo</h3>
                        <span class="float-end"><a href="{{route('admin.photos')}}">All Photos</a></span>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-success">
                        {{ session('message') }}
                        </div>
                        @endif
                        <form wire:submit.prevent="updatePhoto()" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control"  wire:model="title" wire:keyup="generateSlug()">
                                @error('title')
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
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control"  wire:model="description">
                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="" class="form-control" id="" wire:model="category_id">
                                    <option value="0">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" wire:model="status">
                                    <option value="1">Active</option>
                                    <option value="0">In-active</option>
                                </select>
                                @error('status')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="new_main_image">Cover Photo</label>
                                <input type="file" class="form-control" wire:model="new_main_image" >
                                @if ($new_main_image)
                                <img src="{{$new_main_image->temporaryUrl()}}" width="120" />
                                @else
                                <img src="{{asset('storage/cover-photos')}}/{{$main_image}}" width="120" alt="image" />
                                @endif
                                {{-- @error('new_main_image')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <label for="images">Photo</label>
                                <input type="file" class="form-control" wire:model="images" multiple>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function scrollToTop() {
            window.scrollTo(0, 0);
        }
    </script>

    <script>
        AOS.init();
    </script>
@endpush