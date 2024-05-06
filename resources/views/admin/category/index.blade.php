@extends('admin.layouts._masterLayout')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="block">
        @if(session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
        @endif
        <div class="title"><strong>Categories</strong></div>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary text-black">Add new</a>
        @if (count($categories))
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Preview</th>
                  <th>Is Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                  <tr id="row-{{ $category->id }}" >
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{$category->name}}</td>
                    <td><img style="width: 80px; height: 40px; object-fit: cover" src="{{ asset('uploads/category/' . $category->images[0]->name) }}" alt="" srcset=""></td>
                    <td>{{ $category->is_active ? 'true' : 'false'}}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary text-black">Edit</a>
                        {{-- <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-secondary delete-btn text-black">Delete</a> --}}
                        <button data-id="{{ $category->id}}" class="btn btn-secondary text-black delete-btn">Delete</button>
                    </td>
                  </tr>
                  @if (count($category->children) > 0)
                    @foreach ($category->children as $child)
                    <tr id="row-{{ $child->id }}">
                      <th scope="row">{{ $child->id }}</th>
                      <td>{{ '_ ' . $child->name}}</td>
                      <td><img style="width: 80px; height: 40px; object-fit: cover" src="{{ asset('uploads/category/' . $child->images[0]->name) }}" alt="" srcset=""></td>
                        <td>{{ $child->is_active ? 'true' : 'false'}}</td>
                        <td>
                            <a href="{{ route('admin.category.edit', $child->id) }}" class="btn btn-primary text-black">Edit</a>

                            <button data-id="{{ $child->id}}" class="btn btn-secondary text-black delete-btn">Delete</button>
                            {{-- <a href="{{ route('admin.category.delete', $child->id) }}" class="btn btn-secondary delete-btn text-black">Delete</a> --}}
                        </td>
                    </tr>   
                    @endforeach
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $categories->render('admin.layouts._paginate') }}
        @endif
       
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('custom/admin/js/deleteRow.js') }}"></script>
<script>
$(".delete-btn").click(e => {
    const itemId = e.target.getAttribute('data-id')
    deleteRow(itemId, 'categories')
    $('#row-' + itemId).remove()
});
</script>
@endsection