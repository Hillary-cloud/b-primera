<div>
    {{-- Do your work, then step back. --}}


    <div class="container mt-3">
        <div class="search mb-3">
            <form class="d-flex me-auto ms-auto" method="GET">
                <select name="" class="form-control" wire:model="search" style="width: 250px" id="">
                    <option value="">All Category <span class=""><i
                                class="fa fa-angle-double-right"></i></span></option>
                    @foreach ($categories as $category)
                        <option>{{ $category->name }}</option></a>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="row">

            @if (count($photos) > 0)
                @foreach ($photos as $photo)
                    @if ($photo->status == '1')
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <a href="{{ route('view-photo-details', $photo->slug) }}">
                                <img src="{{ asset('storage/cover-photos/' . $photo->main_image) }}" alt="image"
                                    class="img-fluid mb-4" />
                            </a>
                        </div>
                    @endif
                @endforeach
            @else
                <p class="text-danger text-center">No photo found</p>
            @endif

            <div class="paginate mt-3">
                {{ $photos->links() }}
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
