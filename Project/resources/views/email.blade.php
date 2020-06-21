<font face="Arial">
  <div class="">
    <div class=""></div>
    <h3><font color="#FF9600">Thông tin khách hàng</font></h3>
    <p>
      <strong class="info">Khách hàng: </strong>
      <p>Long</p>
    </p>
    <p>
      <strong class="info">Email: </strong>
      <p>hoanglong2703@gmail.com</p>
    </p>
    <p>
      <strong class="info">Điện thoại: </strong>
      <p>0987733697</p>
    </p>
    <p>
      <strong class="info">Địa chỉ: </strong>
      <p>Đống Đa, Hà Nội</p>
    </p>
  </div>
  <div class="">
    <h3><font color="#FF9600">Hóa đơn mua hàng: </font></h3>
    <table border="1" cellspacing="0">
      <tr>
        <td><strong>Tên sản phẩm</strong></td>
        <td><strong>Giá</strong></td>
        <td><strong>Số lượng</strong></td>
        <td><strong>Thành tiền</strong></td>
      </tr>
      @foreach ($cart as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->price}} $</td>
        <td>{{$item->qty}}</td>
        <td>{{$item->price*$item->qty}} $</td>
      </tr>
      @endforeach
      <tr>
        <td>Tổng tiền:</td>
        <td colspan="3" align="right">{{$subtotal}}</td>
      </tr>
    </table>
  </div>
  <div class="col-md-12 hoanthanh">
    <div class="clearfix"></div>
    <p class="info">Quý khách đã đặt hàng thành công!</p>
    <p>- Hóa đơn mua hàng của Quý khách đã được chuyển đến
    địa chỉ email có trong phần Thông tin khách hàng của
    chúng tôi. </p>
    <p>- Sản phẩm của quý khách sẽ được chuyển đến địa chỉ
    của quý khách sau thời gian từ 2-8h, tính từ thời điểm
     xác nhận đơn hàng thành công.</p>
    <p>- Nhân viên giao hàng sẽ liên hệ với quý khách qua
    số điện thoại của quý khách trước khi giao hàng.</p>
    <p>Cám ơn quý khách đã sử dụng sản phẩm của công ty
    chúng tôi!</p><br>

    <h5>Team 1 Shop</h5>
    <p>Detech Tower - số 8 Tôn Thất Thuyết,
       Mỹ Đình, Nam Từ Liêm, Hà Nội</p>


  </div>
</font>
