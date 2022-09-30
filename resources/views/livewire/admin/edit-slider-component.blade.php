<div class="container mt-5">
    <div class="row">
        <div class="container">          
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Edit Slide</h3>
                    <span class="float-end"><a href="{{route('admin.slides')}}">All Slides</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <form wire:submit.prevent="updateSlide()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Slide name</label>
                            <input type="text" class="form-control"  wire:model="name">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" wire:model="status">
                                <option value="1">Active</option>
                                <option value="0">In-active</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="new_slide_image">Slide Image</label>
                            <input type="file" class="form-control" wire:model="new_slide_image" >
                            @if ($new_slide_image)
                            <img src="{{$new_slide_image->temporaryUrl()}}" width="120" />
                            @else
                            <img src="{{asset('storage/slide-photos')}}/{{$slide_image}}" width="120" alt="image" />
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