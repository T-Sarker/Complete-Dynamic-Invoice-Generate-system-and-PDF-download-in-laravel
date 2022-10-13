@extends('layouts.master')
@section('title', 'Category|Edit')

@section('content')
    <div class="container">
    	<div class="my-3">
    		<h2 class="mb-3">EDIT SERVICE CATEGORY</h2>
        @if(!empty($category))
    		<form class="mt-5" method="POST" action="{{route('update')}}" >
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Service Category Name</label>
            <input type="hidden" name="id" value="{{$category->id}}">
             <input type="text" class="form-control" id="name" name="name" placeholder="Category name" value="{{$category->name}}">
              @error("name")
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