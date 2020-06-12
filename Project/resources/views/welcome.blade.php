@extends('layouts.frontend')

@section ('content')



<section class="ftco-section ftco-category ftco-no-pt">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
              <div class="col-md-12 order-md-last align-items-stretch d-flex">
                  <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
                      <div class="text text-center">
                          <h2>Vegetables</h2>
                          <p>Protect the health of every home</p>
                          <p><a href="{{ route('index.shop') }}" class="btn btn-primary">Shop now</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <hr>
    <div class="row">
      @foreach ($lsCategory as $cat)
        <div class="col-md-4">
        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/{{ $cat->cat_img }});">
          <div class="text px-3 py-1">
            <h2 class="mb-0"><a href="">{{ $cat->cat_name }}</a></h2>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Featured Products</span>
        <h2 class="mb-4">Our Products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
        @foreach ($lsProduct as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">
                        <span class="status">{{ $product->discount }}%</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{ acset('/{{ $product->pr_name }}') }}">{{ $product->pr_name }}</a></h3>
                        <div class="d-flex">
                        <div class="pricing">
                            <p class="price"><span class="mr-2 price-dc">${{ $product->pr_price }}</span><span class="price-sale">${{ ($product->pr_price)-($product->pr_price)*($product->discount)/100 }}</span> </p>
                        </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                        <div class="m-auto d-flex">
                            <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                            <span><i class="ion-ios-menu"></i></span>
                            </a>
                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                            <span><i class="ion-ios-cart"></i></span>
                            </a>
                            {{-- <a href="#" class="heart d-flex justify-content-center align-items-center ">
                            <span><i class="ion-ios-heart"></i></span>
                            </a> --}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
  </div>
</section>

<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
        <span class="subheading">Best Price For You</span>
        <h2 class="mb-4">Deal of the day</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        <h3><a href="#">Spinach</a></h3>
        <span class="price">$10 <a href="#">now $5 only</a></span>
        <div id="timer" class="d-flex mt-5">
          <div class="time" id="days"></div>
          <div class="time pl-3" id="hours"></div>
          <div class="time pl-3" id="minutes"></div>
          <div class="time pl-3" id="seconds"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Testimony</span>
        <h2 class="mb-4">Our satisfied customer says</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
            @foreach($lsComment as $comm)
                <div class="item">
                    <div class="testimony-wrap p-4 pb-5">
                        <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                            <span class="quote d-flex align-items-center justify-content-center">
                            <i class="icon-quote-left"></i>
                            </span>
                        </div>
                        <div class="text text-center">
                            <p class="mb-5 pl-4 line">{{ $comm->comm_conten }}</p>
                            <p class="name">{{ $comm->cus_name }}</p>
                            <span class="position">{{ $comm->cus_addres }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<hr>

</section>




@endsection
