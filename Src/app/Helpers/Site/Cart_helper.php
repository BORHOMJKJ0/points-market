<?php

class Cart
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public static function get()
    {
        return session('cart');
    }

    public static function push($item)
    {
        $cart = self::get();

        $cart->push($item);

        session()->put('cart', $cart);
    }

    public static function remove($product_id)
    {
        $cart = self::get();

        $cart = $cart->reject(function ($product_in_cart) use ($product_id) {
            return $product_id == $product_in_cart->id;
        });

        session()->put('cart', $cart);
    }

    public static function has_product($product_id)
    {
        return self::get()->contains('id', $product_id);
    }

    public static function total_quantity()
    {
        return self::get()->count();
    }

    public static function total_price($format = true)
    {
        $cart = self::get();
        $total_price = 0;
        foreach ($cart as $product_in_cart) {
            $total_price += $product_in_cart->offer_price() * $product_in_cart->cart_quantity;
        }

        return $total_price;
    }

    public static function empty()
    {
        return self::get()->isEmpty();
    }
}
