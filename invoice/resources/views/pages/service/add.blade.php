@extends('layouts.master')
@section('title', 'Service|add')

@section('content')
    <div class="container-fluid">
    	<div class="my-3">
    		<h2 class="mb-3">ADD SERVICE CATEGORY</h2>
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
    		<form class="mt-5" method="POST" action="{{route('service.add')}}" >
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
             <select class="form-select" name="category" aria-label="Default select example">
                <option value="">Select</option>
                @if(!empty($category))
                  @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                @endif
              </select>
              @error("category")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <div class="mb-3">
            <label for="name" class="form-label">Service Name</label>
             <input type="text" class="form-control" id="name" name="name" placeholder="Category name" value="{{old('name')}}">
              @error("name")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <div class="mb-3">
            <label for="price" class="form-label">Service Price</label>
             <input type="text" class="form-control" id="price" name="price" placeholder="Category name" value="{{old('price')}}">
              @error("price")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    	</div>
    </div>	


@endsection