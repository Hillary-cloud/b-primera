<div>
    {{-- The whole world belongs to you. --}}

<div class="container mt-5">
    <div class="row">
        <div class="container">
            <div class="card ">
                <div class="card-header">
                <h3 class="float-start">Slides</h3>
                <span class="float-end"><a href="{{route('admin.add-slide')}}"><button class="btn btn-success">+</button></a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover"> 
                            @if (count($slides) > 0)
                            <thead>
                                <tr>
                                    {{-- <th>id</th> --}}
                                    <th>slide</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($slides as $slide)
                                        <tr>
                                            {{-- <td>{{$slide->id}}</td> --}}
                                            <td><img src="{{asset('storage/slide-photos/'.$slide->slide_image)}}" alt="" width="50px"></td>
                                            <td>{{$slide->name}}</td>
                                            <td>{{$slide->status}}</td>

                                            <td>
                                                {{-- <a href="{{route('admin.edit-slide',$slide->slug)}}"><i class="fa fa-edit fa-2x"></i></a> --}}
                                            </td>
                                            <td>
                                                {{-- <a href="" wire:click.prevent="deleteslide({{$slide->id}})" onclick="return confirm('You are about to delete this slide')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                            @else
                            <p class="text-center text-danger">No slide found</p>
                        @endif
                        </table>
                        <div>
                            {{ $slides->links() }}
                        </div>
                        
                    </div>
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