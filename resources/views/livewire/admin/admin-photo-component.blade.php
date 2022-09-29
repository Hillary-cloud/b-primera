<div>
    {{-- The whole world belongs to you. --}}

<div class="container mt-5">
    <div class="row">
        <div class="container">
            <div class="card ">
                <div class="card-header">
                <h3 class="float-start">Photos</h3>
                <span class="float-end"><a href="{{route('admin.add-photo')}}"><button class="btn btn-success">+</button></a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <input type="text" style="width: 300px" placeholder="Search..." wire:model="search"  class="form-control">
                      

                    <div class="table-responsive">
                        <table class="table table-striped table-hover"> 
                            @if (count($photos) > 0)
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($photos as $photo)
                                        <tr>
                                            <td>{{$photo->id}}</td>
                                            <td><img src="{{asset('storage/cover-photos/'.$photo->main_image)}}" alt="" width="50px"></td>
                                            <td>{{$photo->title}}</td>
                                            <td>{{$photo->description}}</td>
                                            <td>{{$photo->status}}</td>
                                            <td>{{$photo->category->name}}</td>
                                            <td>
                                                <a href="{{route('admin.view-photo',$photo->slug)}}"><i class="fa fa-eye fa-2x"></i></a>
                                            </td>

                                            <td>
                                                <a href="{{route('admin.edit-photo',$photo->slug)}}"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td>
                                                <a href="" wire:click.prevent="deletePhoto({{$photo->id}})" onclick="return confirm('You are about to delete this Photo')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                            @else
                            <p class="text-center text-danger">No photo found</p>
                        @endif
                        </table>
                        <div>
                            {{ $photos->links() }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>