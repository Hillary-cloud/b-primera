<div>
    {{-- The whole world belongs to you. --}}

<div class="container mt-5">
    <div class="row">
        <div class="container">
            <div class="card ">
                <div class="card-header">
                <h3 class="float-start">Collages</h3>
                <span class="float-end"><a href="{{route('admin.add-collage')}}"><button class="btn btn-success">+</button></a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover"> 
                            @if (count($collages) > 0)
                            <thead>
                                <tr>
                                    {{-- <th>id</th> --}}
                                    <th>Collage</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($collages as $collage)
                                        <tr>
                                            {{-- <td>{{$collage->id}}</td> --}}
                                            <td><img src="{{asset('storage/collage-photos/'.$collage->collage_image)}}" alt="" width="50px"></td>
                                            <td>{{$collage->name}}</td>
                                            <td>{{$collage->status}}</td>

                                            <td>
                                                <a href="{{route('admin.edit-collage',$collage->name)}}"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td>
                                                <a href="" wire:click.prevent="deleteCollage({{$collage->id}})" onclick="return confirm('You are about to delete this collage')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                            @else
                            <p class="text-center text-danger">No collage found</p>
                        @endif
                        </table>
                        <div>
                            {{ $collages->links() }}
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