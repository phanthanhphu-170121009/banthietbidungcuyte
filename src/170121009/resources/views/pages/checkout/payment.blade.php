@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Home</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
            <?php 
        $content=Cart::content();
         ?>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $key => $all_pro)
                    <tr>
                        <td class="cart_product">
                            <a href="" ><img src="{{URL::to('public/uploads/product/'.$all_pro->options->image)}}" width="50" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="" src="">{{($all_pro->name)}}</a></h4>
                            <p></p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($all_pro->price).' VNĐ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-to-card')}}" method="post" >
                                    {{ csrf_field() }}
                                    <input class="cart_quantity_input" type="text" name="quantity_card" value="{{($all_pro->qty)}}" autocomplete="off" size="2">
                                    <input type="hidden" value="{{($all_pro->rowId)}}" name="rowId_card" class="form-control">
                                    
                                    
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                    $total= $all_pro->price*$all_pro->qty;
                                ?>
                                {{number_format($total).' VNĐ'}}
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-card/'.$all_pro->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        <div class="review-payment">
            <h2>Chọn hình thức thanh toán</h2><br/>
        </div>
        <div class="payment-options">
            <form action="{{URL::to('/order-place')}}" method="post" >
                {{ csrf_field() }}
                <span>
                    <label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="checkbox"> Tiền mặt</label>
                </span>
                <span>
                    <label><input name="payment_option" value="3" type="checkbox"> Thẻ ghi nợ</label>
                </span>
                <span>
                    <input type="submit" name="order_place_submit" value="Đặt hàng" >
                </span>
            </form>
            </div>
    </div>
</section> <!--/#cart_items-->
@endsection