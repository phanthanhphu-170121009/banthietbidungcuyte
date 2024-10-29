@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        THÔNG TIN NGƯỜI MUA
      </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order_by_id->customers_name}}</td>
                <td>{{ $order_by_id->customers_phone}}</td>
                
              </tr>   
            
          </tbody>
      </table>
    </div>
    </div>
  </div>
<br/>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        THÔNG TIN VẬN CHUYỂN
      </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên người vận chuyển</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order_by_id->shipping_name}}</td>
                <td>{{ $order_by_id->shipping_address}}</td>
                <td>{{ $order_by_id->shipping_phone}}</td>
              </tr>   
            
          </tbody>
      </table>
    </div>
</div>
<br/>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        CHI TIẾT ĐƠN HÀNG
      </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
            @foreach($order_detail as $key => $cate_pro)
            <tr>
                <td>{{ $cate_pro->product_name}}</td>
                <td>{{ $cate_pro->product_sales_quantity}}</td>
                <td>{{ number_format($cate_pro->product_price).' VNĐ'}}</td>
                <td>{{ ($cate_pro->order_total).' VNĐ'}}</td>
              </tr>   
              @endforeach
          </tbody>
      </table>
    </div>
</div>  
@endsection