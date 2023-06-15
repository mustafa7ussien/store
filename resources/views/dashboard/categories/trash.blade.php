@extends('layouts.dashboard')


@section('title','Trashed Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
<li class="breadcrumb-item active">Trashed</li>
@endsection

@section('content')
<div class="mb-4 btn btn-outline-primary"><a href="{{route('categories.index')}}">Back</a></div>

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
           
            <th>Status</th>
            <th>Deleted At</th>
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
          
            <td>{{$category->status}}</td>
            <td>{{$category->deleted_at}}</td>

            <td>
            <form action="{{route('categories.restore',$category->id)}}" method="post">
                    @csrf
                    
                    @method('put') 
                    <button type="submit" class="btn btn-info">Restore</button>
                </form>
            </td>
            <td>
                <form action="{{route('categories.force-delete',$category->id)}}" method="post">
                    @csrf
                    
                    @method('delete') 
                    <button type="submit" class="btn btn-danger"> Force Delete</button>
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
{{$categories->withQueryString()->links()}}
    
@endsection
