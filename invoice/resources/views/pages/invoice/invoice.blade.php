<html>
  <style>
/*
    Common invoice styles. These styles will work in a browser or using the HTML
    to PDF anvil endpoint.
    */

    body {
      font - size: 16px;
}

    table {
      width: 100%;
    border-collapse: collapse;
}

    table tr td {
      padding: 0;
}

    table tr td:last-child {
      text-align: right;
}

    .bold {
      font-weight: bold;
}

    .right {
      text-align: right;
}

    .large {
      font-size: 1.75em;
}

    .total {
      font - weight: bold;
    color: #fb7578;
}

    .logo-container {
      margin: 20px 0 70px 0;
}

    .invoice-info-container {
      font-size: 0.875em;
}
    .invoice-info-container td {
      padding: 4px 0;
}

    .client-name {
      /*font-size: 1.5em;*/
    vertical-align: top;
    text-align: left;
}

    .line-items-container {
      margin: 20px 0;
    font-size: 0.875em;
}

    .line-items-container th {
    text-align: left;
    color: #999;
    border-bottom: 2px solid #ddd;
    padding: 10px 0 15px 0;
    font-size: 0.75em;
    text-transform: uppercase;
}

    .line-items-container th:last-child {
      text-align: right;
}

    .line-items-container td {
      padding: 15px 0;
}

    .line-items-container tbody tr:first-child td {
      padding - top: 15px;
}

    .line-items-container.has-bottom-border tbody tr:last-child td {
      padding - bottom: 15px;
    border-bottom: 2px solid #ddd;
}

    .line-items-container.has-bottom-border {
      margin - bottom: 0;
}

    .line-items-container th.heading-quantity {
      width: 50px;
}
    .line-items-container th.heading-price {
      text-align: right;
    width: 100px;
}
    .line-items-container th.heading-subtotal {
      width: 100px;
}

    .payment-info {
      width: 38%;
    font-size: 0.75em;
    line-height: 1.5;
}

    .footer {
      margin - top: 100px;
}

    .footer-thanks {
      font - size: 1.125em;
}


    .footer-info {
      float: right;
    margin-top: 5px;
    font-size: 0.75em;
    color: #ccc;
}

    .footer-info span {
      padding: 0 5px;
    color: black;
}

    .footer-info span:last-child {
      padding - right: 0;
}

    .page-container {
      display: none;
}
    Footer
    © 2022 GitHub, Inc.
  </style>
  <body>
    

    <div class="logo-container">
      <img
        style="height: 18px"
        src="https://app.useanvil.com/img/email-logo-black.png"
      >
    </div>
@if(!empty($company))
    <table class="invoice-info-container">
      <tr>
        <td style="width: 50%;" class="client-name">
          Company: 
        </td>
        <td>
          {{$company->name}}
          <br>
          {{$company->address}}
        </td>
      </tr>
      
      <tr>
        <td>
          Invoice Date: 
        </td>
        <td>
          <strong>{{ date('Y-m-d') }}</strong>
        </td>
      </tr>
      <tr>
        <td>
          Invoice No: 
        </td>
        <td>
          <strong>{{$uId}}</strong>
        </td>
      </tr>
    </table>
@endif
    @php
      $totalServicePrice =0;
      $totalPartsPrice =0;

    @endphp

    @if(!empty($services))
      <table class="line-items-container">
         <caption>Provided Services</caption>
        <thead>
          <tr>
            <th class="heading-quantity">No</th>
            <th class="heading-description">Service</th>
            <th class="heading-price">Price</th>
            <th class="heading-subtotal">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach($services as $service)
              @php
                $totalServicePrice = $totalServicePrice + $service->price;
              @endphp
              <tr>
                <td>2</td>
                <td>{{$service->service}}</td>
                <td class="right">${{$service->price}}</td>
                <td class="bold">${{$service->price}}</td>
              </tr>
            @endforeach

              <tr style="border-top: 1px solid #efefef;">
                <td><pre> </pre></td>
                <td><pre> </pre></td>
                <td class="right">Total</td>
                <td class="bold">${{$totalServicePrice}}</td>
              </tr>
          
        </tbody>
      </table>
    @endif


    @if(!empty($products))
      <table class="line-items-container">
         <caption>Provided Parts</caption>
        <thead>
          <tr>
            <th class="heading-quantity">No</th>
            <th class="heading-description">Parts name</th>
            <th class="heading-price">Company</th>
            <th class="heading-price">Price</th>
            <th class="heading-price">Quantity</th>
            <th class="heading-subtotal">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach($products as $product)
              @php
                $totalPartsPrice = $totalPartsPrice + ($product->price * $product->quantity);
              @endphp
              <tr>
                <td>2</td>
                <td>{{$product->name}}</td>
                <td class="right">{{$product->company}}</td>
                <td class="right">${{$product->price}}</td>
                <td class="bold">{{$product->quantity}}</td>
                <td class="bold">${{$product->price * $product->quantity}}</td>
              </tr>
            @endforeach
              <tr style="border-top: 1px solid #efefef;">
                <td><pre> </pre></td>
                <td><pre> </pre></td>
                <td><pre> </pre></td>
                <td><pre> </pre></td>
                <td class="right">Total</td>
                <td class="bold">${{$totalPartsPrice}}</td>
              </tr>
        </tbody>
      </table>
    @else
      <pre> </pre>
    @endif
    <hr>
    <h4 style="float: right;margin-bottom: 20px;">Total Bill: <b>${{$totalServicePrice+$totalPartsPrice}}</b></h4>
    <br>
    <br>
    <table class="line-items-container has-bottom-border">
      <thead>
        <tr>
          <th>Payment Info {{$totalServicePrice}}</th>
          <th>Due By</th>
          <th>Total Due</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="payment-info">
            <div>
              Account No: <strong>123567744</strong>
            </div>
            <div>
              Routing No: <strong>120000547</strong>
            </div>
          </td>
          <td class="large">May 30th, 2024</td>
          <td class="large total">${{$totalServicePrice+$totalPartsPrice}}</td>
        </tr>
      </tbody>
    </table>

    <div class="footer">
      <div class="footer-info">
        <span>xxxx@xxxx.com</span> |
        <span>555 444 6666</span> |
        <span>xxxxx.com</span>
      </div>
      <div class="footer-thanks" style="display: inline-block;">
        <span>Signature</span>
        <hr style="width:100%;text-align: left;margin-top: 50px;">
      </div>
    </div>
  </body>

</html>