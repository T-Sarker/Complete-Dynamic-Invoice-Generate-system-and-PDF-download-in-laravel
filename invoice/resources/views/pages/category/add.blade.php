@extends('layouts.master')
@section('title', 'Category|add')

@section('content')
    <div class="container">
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
    		<form class="mt-5" method="POST" action="{{route('add')}}" >
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Service Category Name</label>
             <input type="text" class="form-control" id="name" name="name" placeholder="Category name" value="{{old('name')}}">
              @error("name")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    	</div>
    </div>	


@endsection