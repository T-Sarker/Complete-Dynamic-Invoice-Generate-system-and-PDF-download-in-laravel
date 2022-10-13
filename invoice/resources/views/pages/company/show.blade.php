@extends('layouts.master')
@section('title', 'Company|show')

@section('content')
    <div class="container-fluid">
    	<div class="my-3">
    		<h2 class="mb-3">ALL Company</h2>
        @if(!empty($companies))
        <table class="table table-success table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($companies as $company)
            <tr>
              <th scope="row">1</th>
              <td ><p>{{$company->name}}</p></td>
              <td style="max-width:10%;white-space: break-spaces;">{{$company->address}}</td>
              <td >{{$company->phone}}</td>
              <td >{{$company->status}}</td>
              <td >
                <a href="{{route('company.edit',$company->id)}}" class="badge text-dark bg-warning py-2"><i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('company.destroy',$company->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');" class="badge text-dark bg-danger py-2"><i  class="fa fa-2x fa-trash-o" aria-hidden="true"></i>
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