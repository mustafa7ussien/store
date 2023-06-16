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
        @php
        $products=$category->products()->with('store')->paginate(5);
            
        @endphp
             
        @forelse ($products as $product)
            
       
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
{{$products->links()}}

@endsection