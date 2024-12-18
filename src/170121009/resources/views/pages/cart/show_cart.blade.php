@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container" >
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Home</a></li>
              <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <?php 
        $content=Cart::content();
         ?>
         <div class="col-sm-8">
        <div class="table-responsive cart_info">
            <table class="table table-condensed" >
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
                    <tr  >
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
                                    
                                    <input type="submit" value="+" name="update_qty" >
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
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{Cart::total().' VNĐ'}}</span></li>
                        <li>Thuế <span>{{Cart::tax().' VNĐ'}}</span></li>
                        <li>Vận chuyển <span>Miễn phí</span></li>
                        <li>Tổng cộng <span>{{Cart::total().' VNĐ'}}</span></li>
                    </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        {{-- <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a> --}}
                        <?php 
                            $customer_id=Session::get('customers_id');
                            if($customer_id!=NULL){
                        ?>
                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                        
                        <?php }else{ ?>
                            <li><a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection