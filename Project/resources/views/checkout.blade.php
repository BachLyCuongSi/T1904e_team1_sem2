@extends('layouts.frontend')

@section ('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
        <h1 class="mb-0 bread">Checkout</h1>
      </div>
    </div>
  </div>
</div>
<section class="ftco-section ftco-cart">
  <div class="container">
<div class="row">
  <div class="col-md-12 ftco-animate">
    <div class="cart-list">
      <table class="table">
        <thead class="thead-primary">
          <tr class="text-center">
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
        </thead>
        @foreach (Cart::content() as $item)
        <tbody id="tblorder">
          <tr class="text-center">
            <td class="product-remove"></td>

            <td class="image-prod" id="{{$item->id}}"><div class="img" style="background-image:url('images/{{$item->options->img}}')"></div></td>

            <td class="product-name">
              <h3>{{$item->name}}</h3>
              <p>Far far away, behind the word mountains, far from the countries</p>
            </td>

            <td class="price">$ {{number_format($item->price,0,',','.')}}</td>

            <td class="quantity" id="{{$item->qty}}">
              <div class="input-group mb-3">
                <input type="text" name="quantity" class="quantity form-control input-number" value="{{$item->qty}}" min="1" max="100">
              </div>
            </td>

            <td class="total">$ {{number_format($item->price*$item->qty,0,',','.')}} </td>
          </tr><!-- END TR-->

        </tbody>
        @endforeach
      </table>
    </div>
  </div>
</div>
</div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 ftco-animate">
        <form action="#" class="billing-form" method="post">
          @csrf
          <h3 class="mb-4 billing-heading">Billing Details</h3>
          <div class="row align-items-end">
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label for="firstname">Firt Name</label>
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" placeholder="">
              </div>
            </div> -->
            <!-- <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="country">State / Country</label>
                <div class="select-wrap">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="" id="" class="form-control">
                    <option value="">France</option>
                    <option value="">Italy</option>
                    <option value="">Philippines</option>
                    <option value="">South Korea</option>
                    <option value="">Hongkong</option>
                    <option value="">Japan</option>
                  </select>
                </div>
              </div>
            </div> -->
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="streetaddress">Street Address</label>
                <input type="text" class="form-control" placeholder="House number and street name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="towncity">Town / City</label>
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="postcodezip">Postcode / ZIP *</label>
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="emailaddress">Email Address</label>
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="note">Note</label>
                <textarea name="note" rows="8" cols="76" id="note"></textarea>
              </div>
            </div>

            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group mt-4">
                <div class="radio">
                  <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                  <label><input type="radio" name="optradio"> Ship to different address</label>
                </div>
              </div>
            </div>
          </div>
        </form><!-- END -->
      </div>
      <div class="col-xl-5">
        <div class="row mt-5 pt-3">
          <div class="col-md-12 d-flex mb-5">
            <div class="cart-detail cart-total p-3 p-md-4">
              <h3 class="billing-heading mb-4">Cart Total</h3>
              <p class="d-flex">
                <span>Subtotal</span>
                <span>$ {{Cart::subtotal()}}</span>
              </p>
              <p class="d-flex">
                <span>Delivery</span>
                <span>$0.00</span>
              </p>
              <p class="d-flex">
                <span>Discount</span>
                <span>$3.00</span>
              </p>
              <hr>
              <p class="d-flex total-price">
                <span>Total</span>
                <span>$17.60</span>
              </p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="cart-detail p-3 p-md-4">
              <h3 class="billing-heading mb-4">Payment Method</h3>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="radio">
                     <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="radio">
                     <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="radio">
                     <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="checkbox">
                     <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                  </div>
                </div>
              </div>
              <p><a href="javascript:void(0)" onclick="saveOrder()" class="btn btn-primary py-3 px-4">Place an order</a></p>
              <p><a href="#" class="btn btn-danger py-3 px-4">Cancel</a></p>
            </div>
          </div>
        </div>
      </div> <!-- .col-md-8 -->
    </div>
  </div>
</section> <!-- .section -->
<script type="text/javascript">
  function saveOrder(){
    var lsOrder = [];
    $.each($('#tblorder > tr'),function(){
      lsOrder.push({id:$(this).find('.image-prod').attr('id'), quantity:$(this).find('.quantity').attr('id')});
    });
    console.log(lsOrder);
  }
</script>
@endsection
