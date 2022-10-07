
<div class="container mt-5">
    <div class="row">
        <div class="container">          
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Edit Collage</h3>
                    <span class="float-end"><a href="{{route('admin.collages')}}">All Collages</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <form wire:submit.prevent="updateCollage()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Collage Name</label>
                            <input type="text" class="form-control" wire:model="name">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" wire:model="status">
                                <option value="1">Active</option>
                                <option value="0">In-active</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="new_collage_image">Collage Image</label>
                            <input type="file" class="form-control" wire:model="new_collage_image" >
                            @if ($new_collage_image)
                            <img src="{{$new_collage_image->temporaryUrl()}}" width="120" />
                            @else
                            <img src="{{asset('storage/collage-photos')}}/{{$collage_image}}" width="120" alt="image" />
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
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