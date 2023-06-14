@extends('layouts.dashboard')


@section('title','Edit Category')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Edit Category</li>
@endsection

@section('content')
<form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<div class="form-groub">
    <label for="">Category Name</label>
    <input type="text" name="name" class="form-control" value="{{$category->name}}">

</div>
<div class="form-groub">
    <label for="">Category Parent</label>
    <select name="parent_id" class="form-control form-select">
        <option value="">primary Category</option>
        @foreach ($parents as $parent)
        <option value="{{$parent->id}}" @selected($category->parent_id==$parent->id)>{{$parent->name}}</option>
        @endforeach
    </select>

</div>
<div class="form-groub">
    <label for="">Description</label>
    <textarea name="description" class="form-control">{{$category->description}}</textarea>
</div>
<div class="form-groub">
    <label for="">Image</label>
    <input type="file" name="image" id="" class="form-control">
    @if ($category->image)
    <td><img src="{{asset('storage/'.$category->image)}}" alt="" height="50" ></td>
        
    @endif

</div>
<div class="form-groub"><label for="">Status</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="active" name="status" @checked($category->status=='active')>
            <label class="form-check-label" >
             Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="archived" name="status" @checked($category->status=='archived')>
            <label class="form-check-label" >
              Archived
            </label>
          </div>
    </div>
</div>
<div class="form-groub">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>

@endsection