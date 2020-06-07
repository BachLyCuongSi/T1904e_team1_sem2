@extends('font_end.index')

@section('subcribe')

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                <span>Get e-mail updates about our latest shops and special offers</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="sub_mail" class="subscribe-form">
                    @csrf
                    <div class="form-group d-flex">
                        <input type="text" name="mail" class="form-control" placeholder="Enter email address">
                        <input type="submit" name="sbm_mail" value="Subscribe" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
