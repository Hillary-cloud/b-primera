<div class="container mt-5">
    <div class="row">
        <div class="container">          
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Add Slide</h3>
                    <span class="float-end"><a href="{{route('admin.slides')}}">All Slides</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <form wire:submit.prevent="storeSlide()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Slide name</label>
                            <input type="text" class="form-control"  wire:model="name" required>
                        </div>
                        <div class="form-group">
                            <label for="slide_image">Slide Image</label>
                            <input type="file" class="form-control" id="upload{{$iteration}}" wire:model="slide_image" >
                            @if ($slide_image)
                            <img src="{{$slide_image->temporaryUrl()}}" width="120" />
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