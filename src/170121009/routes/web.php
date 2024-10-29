<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryPost;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
#backend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::post('/tim-kiem', [HomeController::class, 'tim_kiem']);
#danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_product_id}', [CategoryProduct::class, 'showCategoryhome']);
Route::get('/thuong-hieu-san-pham/{brand_product_id}', [BrandProduct::class, 'showBrandhome']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'show_detail']);
#Cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-card/{rowId}', [CartController::class, 'delete_to_cart']);
Route::post('/update-to-card', [CartController::class, 'update_to_cart']);
#check out
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
#customer
#check out
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
#frontend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
#category
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);
Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);
Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);
#order
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
Route::get('/view-order/{order_id}', [CheckoutController::class, 'view_order']);
#brand
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);
Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);
Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);

#product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
#slider
Route::get('/manage-banner', [SliderController::class, 'manage_banner']);
Route::get('/add-banner', [SliderController::class, 'add_banner']);
Route::post('/save-slider', [SliderController::class, 'save_slider']);
Route::get('/unactive-slider/{slider_id}', [SliderController::class, 'unactive_slider']);
Route::get('/active-slider/{slider_id}', [SliderController::class, 'active_slider']);
Route::get('/delete-slider/{slider_id}', [SliderController::class, 'delete_slider']);
#CategoryPost
Route::get('/add-post', [CategoryPost::class, 'add_post']);
Route::get('/edit-post/{post_id}', [CategoryPost::class, 'edit_post']);
Route::get('/delete-post/{post_id}', [CategoryPost::class, 'delete_post']);
Route::post('/update-post/{post_id}', [CategoryPost::class, 'update_post']);
Route::post('/save-post', [CategoryPost::class, 'save_post']);
Route::get('/all-post', [CategoryPost::class, 'all_post']);
Route::get('/unactive-post/{post_id}', [CategoryPost::class, 'unactive_post']);
Route::get('/active-post/{post_id}', [CategoryPost::class, 'active_post']);
#Post
Route::get('/add-postt', [PostController::class, 'add_postt']);
Route::get('/edit-postt/{post_id}', [PostController::class, 'edit_postt']);
Route::get('/delete-postt/{post_id}', [PostController::class, 'delete_postt']);
Route::post('/update-postt/{post_id}', [PostController::class, 'update_postt']);
Route::post('/save-postt', [PostController::class, 'save_postt']);
Route::get('/all-postt', [PostController::class, 'all_postt']);
Route::get('/unactive-postt/{post_id}', [PostController::class, 'unactive_postt']);
Route::get('/active-postt/{post_id}', [PostController::class, 'active_postt']);
#bai viet
Route::get('/danh-muc-bai-viet/{post_slug}', [PostController::class, 'danh_muc_bai_viet']);
Route::get('/bai-viet/{post_slug}', [PostController::class, 'bai_viet']);

#lien he
Route::get('/lien-he', [ContactController::class, 'lien_he']);