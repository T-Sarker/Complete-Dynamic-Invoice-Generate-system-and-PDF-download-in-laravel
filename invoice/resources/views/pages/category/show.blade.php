@extends('layouts.master')
@section('title', 'Category|add')

@section('content')
    <div class="container">
    	<div class="my-3">
    		<h2 class="mb-3">ALL SERVICE CATEGORY</h2>
        @if(!empty($categories))
        <table class="table table-success table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <th scope="row">1</th>
              <td>{{$category->name}}</td>
              <td>{{$category->slug}}</td>
              <td>{{$category->status}}</td>
              <td>
                <a href="{{route('edit',$category->id)}}" class="badge text-dark bg-warning py-2"><i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('destroy',$category->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');" class="badge text-dark bg-danger py-2"><i  class="fa fa-2x fa-trash-o" aria-hidden="true"></i>
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