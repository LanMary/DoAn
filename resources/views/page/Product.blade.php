@extends('layouts.app')
@section('content')

<a href="Product/create">create</a>
<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Promotion_Price</th>
        </tr>
    </thead>
    <tbody>
        @if (count($product)>0) 
           @foreach ($product as $sp)
           <tr>
           <td scope="row" ><img height="100px" width="100px" src="{{asset('source/assets/dest/images/product/')}}/{{$sp->image}}" ></td>
           <td>{{$sp->name}}</td>
           <td>{{$sp->unit_price}}</td>
           <td>{{$sp->promotion_price}}</td>
            </tr>
           @endforeach
        @endif  
    </tbody>
</table>
@endsection
