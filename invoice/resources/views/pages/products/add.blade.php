@extends('layouts.master')
@section('title', 'Product | add')

@section('content')
    <div class="container">
    	<div class="my-3">
    		<h2 class="mb-3">ADD PRODUCT </h2>
        @if(Session::has('err'))
          <div class="alert alert-danger mt-3 mb-2">
              <strong><i class="mdi mdi-alert btn-icon-prepend"></i></strong> {{Session::get('err')}}
          </div>
        @endif

        @if(Session::has('success'))
          <div class="alert alert-success mt-3 mb-2">
              <strong><i class="mdi mdi-alert btn-icon-prepend"></i></strong> {{Session::get('success')}}
          </div>
        @endif
    		<form class="mt-5" method="POST" action="{{route('product.add')}}" >
          @csrf
                    
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
             <input type="text" class="form-control" id="name" name="name" placeholder="Product name" value="{{old('name')}}">
              @error("name")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
             <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="{{old('price')}}">
              @error("price")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <div class="mb-3">
            <label for="company" class="form-label">Company</label>
             <input type="text" class="form-control" id="company" name="company" placeholder="Company name" value="{{old('company')}}">
              @error("company")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <div class="mb-3">
            <label for="details" class="form-label">Details</label>
             <input type="text" class="form-control" id="details" name="details" placeholder="Details" value="{{old('details')}}">
              @error("details")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>

          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
             <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{old('quantity')}}">
              @error("quantity")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    	</div>
    </div>	


@endsection