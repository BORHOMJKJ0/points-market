@extends('admin.layouts.index',["without_card" => true])

@section('content')

<div class="row">
    @can('viewAny', "App\Models\User\User")
    <div class="col-lg-4 col-12">
        <div class="card card-icon mb-4">
            <div class="card-body text-center"><i class="i-Business-Man"></i>
                <p class="text-muted mt-2 mb-2">@lang("labels.users_count")</p>
                <p class="text-primary text-24 line-height-1 m-0">{{$rectangular_statistics->users_count}}</p>
            </div>
        </div>
    </div>
    @endcan

    @can('viewAny', "App\Models\Order\Order")
    <div class="col-lg-4 col-12">
        <div class="card card-icon mb-4">
            <div class="card-body text-center"><i class="i-Checkout"></i>
                <p class="text-muted mt-2 mb-2">@lang("labels.total_orders_prices")</p>
                <p class="text-primary text-24 line-height-1 m-0">{{$rectangular_statistics->total_orders_prices - $rectangular_statistics->total_orders_coupons_discount}} @lang("labels.ryal")</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-12">
        <div class="card card-icon mb-4">
            <div class="card-body text-center"><i class="i-Eye"></i>
                <p class="text-muted mt-2 mb-2">@lang("labels.waiting_review_orders_count")</p>
                <p class="text-primary text-24 line-height-1 m-0">{{$rectangular_statistics->waiting_review_orders_count}}</p>
            </div>
        </div>
    </div>
    @endcan
</div>




@endsection