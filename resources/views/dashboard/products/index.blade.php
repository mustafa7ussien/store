@extends('layouts.dashboard')


@section('title','Products')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
<div class="mb-4 btn btn-outline-primary"><a href="{{route('products.create')}}">Create</a></div>

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
            <th>Category</th>
            <th>Store</th>
            <th>Status</th>
            <th>Created At</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- @if ($products->count()) --}}
             
        @forelse ($products as $product)
            
       
        <tr>
            <td><img src="{{asset('storage/'.$product->image)}}" alt="" height="50" ></td>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->category_id}}</td>
            <td>{{$product->store_id}}</td>
            <td>{{$product->status}}</td>
            <td>{{$product->created_at}}</td>
            <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-success">Edit</a></td>
            <td>
                <form action="{{route('products.destroy',$product->id)}}" method="post">
                    @csrf
                    
                    @method('delete') 
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty 
        <tr colspan="7">
            <td>products Not Found</td>
        </tr>
        @endforelse
      
        
    </tbody>
</table>
{{$products->withQueryString()->links()}}
    
@endsection
