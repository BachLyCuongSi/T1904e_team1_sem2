<!-- slide_tap -->
<!-- h1 My Wishlist -->
<!-- end slide_tap -->


<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>Product List</th>
								<th>&nbsp;</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<!-- dùng vòng lặp in ra sản phẩm 5 sp -->
							<tr class="text-center">
								<td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

								<td class="image-prod">
									<div class="img" style="background-image:url(images/product-1.jpg);"></div>
								</td>

								<td class="product-name">
									<h3>Bell Pepper</h3>
									<p>Far far away, behind the word mountains, far from the countries</p>
								</td>

								<td class="price">$4.90</td>

								<td class="quantity">
									<div class="input-group mb-3">
										<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
									</div>
								</td>

								<td class="total">$4.90</td>
							</tr><!-- END TR-->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- check sub_mail -->

<!-- end sub_mail -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


<script>
	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			// Increment
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>

