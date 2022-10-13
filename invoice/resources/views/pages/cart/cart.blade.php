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
    		<form class="mt-5" id="addServiceCart">
          @csrf
           <div class="my-4">
              <label for="companyList" class="form-label">Select Company</label>
              <select class="form-select" id="companyList" name="companyList">
                <option value="">Select Company</option>
                @if(!empty($companies))
                  @foreach($companies as $com)
                    <option value="{{$com->id}}" id="{{$com->name}}">{{$com->name}}</option>
                  @endforeach
                @else
                  <p>no category found</p>
                @endif
              </select>
            </div>
          <div class="row mb-4" style="align-items: end;">
            <div class="col">
              <label for="name" class="form-label">Select Category</label>
              <select class="form-select" id="category" name="category" aria-label="Default select example">
                <option value="">Select Category</option>
                @if(!empty($categories))
                  @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                @else
                  <p>no category found</p>
                @endif
              </select>
            </div>
            <div class="col">
              <label for="name" class="form-label">Select Service</label>
              <select class="form-select" aria-label="Default select example" id="service" name="service">
                <option value="">Open this select menu</option>
              </select>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-dark text-white">ADD SERVICE TO INVOICE</button>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-12">
            <h3>Company: <span id="companyName"></span></h3>
            <table class="table">
              <tbody id="serviceCartTable">
                
              </tbody>
            </table>

            <h3 class="my-4">Parts: </h3>
            <div class="row">
              <select class="col form-select" id="selectProduct">
              <option value=''>Choose Parts</option>
              @if(!empty($products))
                  @foreach($products as $pro)
                    <option value="{{$pro->id}}">{{$pro->name}}</option>
                  @endforeach
                @else
                  <p>no Part found</p>
                @endif
            </select>
            <select class="col form-select" id="selectProductQuantity">
              <option value='1'>1</option>
              <option value='2'>2</option>
              <option value='3'>3</option>
              <option value='4'>4</option>
              <option value='5'>5</option>
              <option value='6'>6</option>
              <option value='7'>7</option>
              <option value='8'>8</option>
              <option value='9'>9</option>
              <option value='10'>10</option>
            </select>
            <div class="col-3">
             <button type="button" id="addPart" class="form-label btn btn-info">Add Parts</button>
              
            </div>
            </div>
            <table class="table my-4">
              <tbody id="ProductCartTable">
                
              </tbody>
            </table>
          </div> 
          {{-- <a href="{{route('cart.invoice',[])}}" class="btn btn-danger my-3">Create Invoice</a>  --}}
          <button class="btn btn-danger my-3" id="invoicegen">Create Invoice</button>
        </div>
    	</div>
    </div>	

    @push('scripts')
      <script>
        $(document).ready(function(){

                var randomString = function (len, bits)
                    {
                        bits = bits || 36;
                        var outStr = "", newStr;
                        while (outStr.length < len)
                        {
                            newStr = Math.random().toString(bits).slice(2);
                            outStr += newStr.slice(0, Math.min(newStr.length, (len - outStr.length)));
                        }
                        return outStr.toUpperCase();
                    };

                $('#companyList').on('change',function(e)
                   {
                      var company_id = e.target.value; //getting the target company id 
                      var company = $('select[name="companyList"] option:selected').attr('id');
                      $('#companyName').text(company.toUpperCase());
                      
                      $('#cartUniqueId').remove();
                      $('#addServiceCart').append("<input type='hidden' id='cartUniqueId' name='cartUniqueId' value='"+randomString(12,16)+"'>");
                     

                   });


                //fetching category related subject
                $('#category').on('change',function(e)
                   {
                      var cat_id = e.target.value;

                      $.ajax({
                          type: "GET",
                          url:  "/admin/cart/category/service/"+cat_id,
                          success:function(data){
                            
                              if (data.length==0) {
                                $('#service').empty();
                                $('#service').append($("<option class='lol'></option>").attr("value", '').text('No Data'));
                              }else{
                                $('#service').empty();
                                  $.each(data, function(index, value) {
                                    $('#service').append($("<option class='lol'></option>").attr("value", value.id).text(value.name));                              
                                });
                              }
                                
                          }
                      });

                   });

                //creating invoice in new page
                $('#invoicegen').on('click',function(e)
                   {
                      var company = $('select[name="companyList"] option:selected').val();
                      var cartUniqueId = $('#cartUniqueId').val();
                      
                      window.location.href="/admin/cart/invoice/"+company+'/'+cartUniqueId;

                   });

                //adding the service cart function
                $('#addServiceCart').on('submit',function(e){
                    e.preventDefault();
                    var service = $('#service').val();
                    var cartUniqueId = $('#cartUniqueId').val();
                    $.ajax({
                          headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                          type: "POST",
                          data:{service:service,cartUniqueId:cartUniqueId},
                          url:  "/admin/cart/category/service/add",
                          success:function(data){
                            
                              if (data!=false) {
                                 $('#serviceCartTable').append("<tr class='serv"+data.id+"'><td>"+data.service+"</td><td>"+data.price+"</td><td class='btn btn-danger text-black' onClick=myFun("+data.id+")>x</td></tr>")
                              }
                          }
                      });
                });


                //handeling the add parts function
                $('#addPart').on('click',function(e){
                    e.preventDefault();
                    var part = $('#selectProduct').val();
                    var quantity = $('#selectProductQuantity').val();
                    var cartUniqueId = $('#cartUniqueId').val();
                    // alert(part+' nnnnnnnnnn '+cartUniqueId+'-- '+quantity)
                    
                    $.ajax({
                          headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                          type: "POST",
                          data:{part:part,cartUniqueId:cartUniqueId,pquantity:quantity},
                          url:  "/admin/cart/product/parts/add",
                          success:function(data){
                            
                              if (data!=false) {
                                 $('#ProductCartTable').append("<tr class='serv"+data.id+"'><td>"+data.name+"</td><td>"+data.company+"</td><td>"+data.price+"</td><td>"+data.quantity+"</td><td class='btn btn-danger text-black' onClick=myFunDeleteParts("+data.id+")>x</td></tr>")
                              }
                          }
                      });
                });
          });

        function myFun(id) {

           $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                type: "POST",
                data:{serviceDelete:id},
                url:  "/admin/cart/category/service/delete",
                success:function(data){
                  
                    if (data!=false) {
                        $('.serv'+id).remove();
                    }
                }
            });
        }
         


         function myFunDeleteParts(id) {

           $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                type: "POST",
                data:{partsDelete:id},
                url:  "/admin/cart/product/parts/delete",
                success:function(data){
                  
                    if (data!=false) {
                        $('.serv'+id).remove();
                    }
                }
            });
        }
         
    </script>
    @endpush
@endsection