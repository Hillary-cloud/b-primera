<div>
    {{-- Do your work, then step back. --}}
    @livewire('header-search-component')

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    @foreach ($photos as $photo)
                        <img src="{{asset('storage/cover-photos/'.$photo->main_image)}}" alt="image"  />
                    @endforeach
            </div>
        </div>
    </div>
</div>
