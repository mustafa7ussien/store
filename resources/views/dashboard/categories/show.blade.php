@extends('layouts.dashboard')


@section('title',$category->name)
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">{{$category->name}}</li>
@endsection

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Store</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        {{-- @if ($products->count()) --}}
             
        @forelse ($category->products as $product)
            
       
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->store->name}}</td>
            <td>{{$product->status}}</td>
            <td>{{$product->created_at}}</td>

        </tr>
        @empty 
        <tr colspan="7">
            <td>products Not Found</td>
        </tr>
        @endforelse
      
        
    </tbody>
</table>
@endsection