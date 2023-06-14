@extends('layouts.dashboard')


@section('title','Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
<div class="mb-4 btn btn-outline-primary"><a href="{{route('categories.create')}}">Create</a></div>

@if (session()->has('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
    
@endif
<form action="{{URL::current()}}" method="get" class="d-flex justify-content-between mb-4">
<input type="text" name="name" placeholder="name" class="form-control" :value="request('name')" >
<select name="status" class="form-control" >
    <option value="">All</option>
    <option value="active" @selected(request('status')=='active')>Active</option>
    <option value="archived" @selected(request('status')=='archived')>Archived</option>
</select>
<button class="btn btn-succes">Filter</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Status</th>
            <th>Created At</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- @if ($categories->count()) --}}
             
        @forelse ($categories as $category)
            
       
        <tr>
            <td><img src="{{asset('storage/'.$category->image)}}" alt="" height="50" ></td>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->parent_id}}</td>
            <td>{{$category->status}}</td>
            <td>{{$category->created_at}}</td>
            <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-success">Edit</a></td>
            <td>
                <form action="{{route('categories.destroy',$category->id)}}" method="post">
                    @csrf
                    
                    @method('delete') 
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty 
        <tr colspan="7">
            <td>Categories Not Found</td>
        </tr>
        @endforelse
      
        
    </tbody>
</table>
{{$categories->links()}}
    
@endsection
