<div>
    {{-- In work, do what you enjoy. --}}
    <form class="d-flex me-auto ms-auto">
        <select name="" class="form-control ms-5" wire:model="search" style="width: 250px" id="">
            <option value="">All Category <span class=""><i class="fa fa-angle-double-right"></i></span></option>
            @foreach ($categories as $category)
               <option>{{$category->name}}</option></a>
            @endforeach
        </select>
        <button class="btn btn-outline-warning ms-3">Search</button>
    </form>
</div>
