<tr>
    <td class="si-pic"><img width="25%" src="{{ $product_in_cart->uploads("main_image") }}"></td>
    <td class="si-text">
        <div class="product-selected">
            <p>{{ number_format($product_in_cart->offer_price(),1) }} @lang("labels.ryal") x {{ $product_in_cart->cart_quantity }}</p>
            <h6>{{ $product_in_cart->name  }}</h6>
        </div>
    </td>

</tr>