@extends('layout')
@section('content')
<div class=" col-sm-6 container">
    <table class="table m-4">
        <tbody>
          <tr>
            <td>Amount</td>
            <td>${{$total}}</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>$10</td>
          </tr>
          <tr>
            <td>Total Amount</td>
            <td>${{$total+10}}</td>
          </tr>
        </tbody>
      </table>
      <form action="/placeOrder" method="POST">
        @csrf
          <div class="form-group">
              <textarea name="address" cols="68" rows="2" placeholder="Enter your address."></textarea>
          </div>
          <div class="form-group">
              <label for="pwd" class="bg">Payment Method</label><br>
              <input type="radio" value="cash" name="payment"><span> Online Payment</span><br>
              <input type="radio" value="cash" name="payment" ><span> Cash on Delivery</span>
          </div>
          <input class="btn btn-success" type="submit" value="Order">
      </form>
</div>
@endsection

