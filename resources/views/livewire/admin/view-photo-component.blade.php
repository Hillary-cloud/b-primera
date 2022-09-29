<div>
    {{-- Be like water. --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <img src="{{asset('storage/cover-photos')}}/{{$main_image}}" width="300px" alt="image" />
               
               
            </div>
        </div>
        @foreach ($images as $item)
        <p class="text-white">{{$item->description}}</p>
        <img src="{{asset('storage/photos')}}/{{$item->image}}" alt="image" />
        @endforeach
    </div>
</div>
