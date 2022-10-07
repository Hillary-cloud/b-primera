<div class="container mt-5">
    <div class="row">
        <div class="container">          
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Add Collage</h3>
                    <span class="float-end"><a href="{{route('admin.collages')}}">All Collages</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <form wire:submit.prevent="storeCollage()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Collage Name</label>
                            <input type="text" class="form-control"  wire:model="name">
                        </div>
                        <div class="form-group">
                            <label for="collage_image">Collage Image</label>
                            <input type="file" class="form-control" id="upload{{$iteration}}" wire:model="collage_image" >
                            @if ($collage_image)
                            <img src="{{$collage_image->temporaryUrl()}}" width="120" />
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