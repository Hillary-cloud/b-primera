<div>
    <div class="container mt-5">
    <div class="row">
        <div class="container">
            <div class="card ">
                <div class="card-header">
                <h3 class="float-start">Categories</h3>
                <span class="float-end"><a href="{{route('admin.add-category')}}"><button class="btn btn-success">+</button></a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover"> 
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.edit-category',$category->slug)}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="" wire:click.prevent="deleteCategory({{$category->id}})" onclick="return confirm('You are about to delete this category')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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