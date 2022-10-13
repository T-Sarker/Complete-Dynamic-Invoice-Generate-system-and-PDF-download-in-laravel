@extends('layouts.master')
@section('title', 'Company | add')

@section('content')
    <div class="container">
    	<div class="my-3">
    		<h2 class="mb-3">ADD COMPANY </h2>
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
    		<form class="mt-5" method="POST" action="{{route('company.add')}}" >
          @csrf
                    
          <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
             <input type="text" class="form-control" id="name" name="name" placeholder="Company name" value="{{old('name')}}">
              @error("name")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
             <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{old('address')}}">
              @error("address")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>
          
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
             <input type="tel" class="form-control" id="phone" name="phone" placeholder="Company phone" value="{{old('phone')}}">
              @error("phone")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
          </div>          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    	</div>
    </div>	


@endsection