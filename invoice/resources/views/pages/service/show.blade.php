@extends('layouts.master')
@section('title', 'Category|add')

@section('content')
    <div class="container-fluid">
    	<div class="my-3">
    		<h2 class="mb-3">ALL SERVICE CATEGORY</h2>
        @if(!empty($services))
        <table class="table table-success table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Category</th>
              <th scope="col">Slug</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($services as $service)
            <tr>
              <th scope="row">1</th>
              <td>{{$service->name}}</td>
              <td>{{$service->price}}</td>
              <td>{{$service->getCategory->name}}</td>
              <td>{{$service->slug}}</td>
              <td>{{$service->status}}</td>
              <td>
                <a href="{{route('service.edit',$service->id)}}" class="badge text-dark bg-warning py-2"><i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('service.destroy',$service->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');" class="badge text-dark bg-danger py-2"><i  class="fa fa-2x fa-trash-o" aria-hidden="true"></i>
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