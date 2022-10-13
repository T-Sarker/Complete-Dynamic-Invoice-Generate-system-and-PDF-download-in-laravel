@extends('layouts.master')
@section('title', 'Category|add')

@section('content')
    <div class="container-fluid">
    	<div class="my-3">
    		<h2 class="mb-3">ALL SERVICE CATEGORY</h2>
        @if(!empty($products))
        <table class="table table-success table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Company</th>
              <th scope="col">Details</th>
              <th scope="col">Quantity</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <th scope="row">1</th>
              <td style="max-width:10%;white-space: break-spaces;"><p>{{$product->name}}</p></td>
              <td style="max-width:7%;white-space: break-spaces;">{{$product->price}}</td>
              <td style="max-width:7%;white-space: break-spaces;">{{$product->company}}</td>
              <td style="max-width:20%;white-space: break-spaces;">{{ substr($product->details, 0,  50) }}...</td>
              <td style="max-width:5%;white-space: break-spaces;">{{$product->quantity}}</td>
              <td style="max-width:3%;white-space: break-spaces;">{{$product->status}}</td>
              <td style="max-width:20%;white-space: break-spaces;">
                <a href="{{route('product.edit',$product->id)}}" class="badge text-dark bg-warning py-2"><i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('product.destroy',$product->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');" class="badge text-dark bg-danger py-2"><i  class="fa fa-2x fa-trash-o" aria-hidden="true"></i>
</a>
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
        @else
          <p>No data Found</p>
        @endif
    	</div>
    </div>	


@endsection