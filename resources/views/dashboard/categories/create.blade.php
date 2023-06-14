@extends('layouts.dashboard')


@section('title','Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
    @if ($errors->any())
    <div class="alert alert-danger">
        <h3>ERROR Occured</h3>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            
        </ul>
    </div>
        
    @endif
@csrf
<div class="form-groub">
    <label for="">Category Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" >
    @error('name')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror

</div>
<div class="form-groub">
    <label for="">Category Parent</label>
    <select name="parent_id" class="form-control form-select">
        <option value="">primary Category</option>
        @foreach ($parents as $parent)
        <option @selected(old('parent_id')== $parent->id) value="{{$parent->id}}">{{$parent->name}}</option>
        @endforeach
    </select>

</div>
<div class="form-groub">
    <label for="">Description</label>
    <textarea name="description" class="form-control">{{old('description')}}</textarea>
</div>
<div class="form-groub">
    <label for="">Image</label>
    <input type="file" name="image" id="" class="form-control">

</div>
<div class="form-groub"><label for="">Status</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="active" name="status" @checked(old('status')=='active')>
            <label class="form-check-label" >
             Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="archived" name="status" @checked(old('status')=='archived')>
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