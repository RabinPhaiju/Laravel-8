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
      <form action="">
          <div class="form-group">
              <textarea name="" id="" cols="68" rows="2">Type your message.</textarea>
          </div>
          <div class="form-group">
              <label for="pwd" class="bg">Payment Method</label><br>
              <input type="radio" name="payment"><span> Online Payment</span><br>
              <input type="radio" name="payment" ><span> Cash on Delivery</span>
          </div>
          <input class="btn btn-success" type="button" value="Order">
      </form>
</div>
@endsection

