@extends('layouts.master')
@section('title', 'Company | Profile')

@section('content')
    <div class="container">
    	<div class="my-3">
    		<h2 class="mb-3">COMPANY Profile</h2>
        @if(!empty($company))
      		<div class="card">
            <img style="max-width:30%" src="https://img.freepik.com/premium-vector/illustration-vector-graphic-cartoon-character-company_516790-299.jpg" class="card-img-top" alt="...">
            <div class="card-body" data="{{$company->id}}">
              <h5 class="card-title">{{$company->name}}</h5>
              <p class="card-text">{{$company->address}}</p>
              <p class="card-text">{{$company->phone}}</p>
            </div>
            <b>Invoices</b>
            <ul class="list-group list-group-flush">
              @foreach($company->getCarts as $cart)
                <li class="list-group-item">{{$cart->cartId}} <span data="{{$cart->cartId}}" class="float-right vtn btn-info px-2 detailsInvoice"><i class="fa fa-eye"></i> Details</span></li>
              @endforeach
            </ul>
            
          </div>
        @endif
    	</div>
    </div>	


@push('scripts')
      <script>
        $(document).ready(function(){


               

                //handeling the add parts function
                $('.detailsInvoice').on('click',function(e){
                    e.preventDefault();
                    var cartId = $(this).attr('data');
                    var company = $('.card-body').attr('data');
                    window.location.href="/admin/cart/invoice/"+company+'/'+cartId;
                });
          });

    </script>
    @endpush
@endsection