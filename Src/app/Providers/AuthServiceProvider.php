<?php

namespace App\Providers;

use App\Models\Admin\Admin;
use App\Models\Coupon;
use App\Models\Order\Order;
use App\Models\Product\Offer;
use App\Models\Product\Product;
use App\Models\Product\Repository;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\User\User;
use App\Policies\Models\CouponPolicy;
use App\Policies\Models\Order\OrderPolicy;
use App\Policies\Models\Product\OfferPolicy;
use App\Policies\Models\Product\ProductPolicy;
use App\Policies\Models\Product\RepositoryPolicy;
use App\Policies\Models\SectionPolicy;
use App\Policies\Models\SettingPolicy;
use App\Policies\Models\SliderPolicy;
use App\Policies\Models\User\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Section::class => SectionPolicy::class,
        Setting::class => SettingPolicy::class,
        Product::class => ProductPolicy::class,
        Repository::class => RepositoryPolicy::class,
        Offer::class => OfferPolicy::class,
        Coupon::class => CouponPolicy::class,
        Slider::class => SliderPolicy::class,
        Order::class => OrderPolicy::class,
        User::class => UserPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if ($this->is_admin($user) && $user->super) {
                return true;
            }
        });

    }

    private function is_admin($user)
    {
        return $user instanceof Admin;
    }
}
