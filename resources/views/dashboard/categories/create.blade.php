@extends('layouts.dashboard')


@section('title','Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-groub">
    <label for="">Category Name</label>
    <input type="text" name="name" class="form-control">

</div>
<div class="form-groub">
    <label for="">Category Parent</label>
    <select name="parent_id" class="form-control form-select">
        <option value="">primary Category</option>
        @foreach ($parents as $parent)
        <option value="{{$parent->id}}">{{$parent->name}}</option>
        @endforeach
    </select>

</div>
<div class="form-groub">
    <label for="">Description</label>
    <textarea name="description" class="form-control"></textarea>
</div>
<div class="form-groub">
    <label for="">Image</label>
    <input type="file" name="image" id="" class="form-control">

</div>
<div class="form-groub"><label for="">Status</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="active" name="status" checked>
            <label class="form-check-label" >
             Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="archived" name="status">
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