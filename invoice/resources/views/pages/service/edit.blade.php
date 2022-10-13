@extends('layouts.master')
@section('title', 'Category|Edit')

@section('content')
    <div class="container">
    	<div class="my-3">
    		<h2 class="mb-3">EDIT SERVICE CATEGORY</h2>
        @if(!empty($service))
      		<form class="mt-5" method="POST" action="{{route('service.update')}}" >
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Category Name</label>
               <select class="form-select" name="category" aria-label="Default select example">
                  <option value="">Select</option>
                  @if(!empty($categories))
                    @foreach($categories as $cat)
                      <option value="{{$cat->id}}" {{ $cat->id==$service->category?'selected':'' }}>{{$cat->name}}</option>
                    @endforeach
                  @endif
                </select>
                @error("category")
                  <p class="alert alert-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="mb-3">
              <label for="name" class="form-label">Service Name</label>
              <input type="hidden" name="id" value="{{$service->id}}">
               <input type="text" class="form-control" id="name" name="name" placeholder="Category name" value="{{$service->name}}">
                @error("name")
                  <p class="alert alert-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="mb-3">
              <label for="price" class="form-label">Service Price</label>
               <input type="text" class="form-control" id="price" name="price" placeholder="Category name" value="{{$service->price}}">
                @error("price")
                  <p class="alert alert-danger">{{$message}}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        @else
        @endif
    	</div>
    </div>	


@endsection