<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item {{ current_page("admin") }}"><a class="nav-item-hold" href="{{ route("admin.home") }}"><i class="nav-icon i-Home-2"></i><span class="nav-text">@lang("pages.home")</span></a>
                <div class="triangle"></div>
            </li>

            @can("superAdmin")
            <li class="nav-item {{ current_page("admin/admins*","admin/roles*") }}" data-item="admins"><a class="nav-item-hold" href="#"><i class="nav-icon i-Business-Man"></i><span class="nav-text">@lang("labels.admins")</span></a>
                <div class="triangle"></div>
            </li>
            @endcan



            @if(
            admin()->can("viewAny","App\Models\Section") ||
            admin()->can("viewAny","App\Models\Product\Product")||
            admin()->can("viewAny","App\Models\Coupon")
            )
            <li class="nav-item {{ current_page("admin/sections*",'admin/products*',"admin/coupons*") }}" data-item="products"><a class="nav-item-hold" href="#"><i class="nav-icon i-Shop"></i><span class="nav-text">@lang("labels.products")</span></a>
                <div class="triangle"></div>
            </li>
            @endif

            @if(
            admin()->can("viewAny","App\Models\User\User") ||
            admin()->can("viewAny","App\Models\Order\Order"))
            <li class="nav-item {{ current_page("admin/users*",'admin/orders*') }}" data-item="users"><a class="nav-item-hold" href="#"><i class="nav-icon i-Mens"></i><span class="nav-text">@lang("labels.users")</span></a>
                <div class="triangle"></div>
            </li>
            @endif


            @if (
            admin()->can("viewAny","App\Models\Slider")
            )
            <li class="nav-item  {{ current_page("admin/sliders*") }}" data-item="content"><a class="nav-item-hold" href="#"><i class="nav-icon i-Notepad-2"></i><span class="nav-text">@lang("labels.content")</span></a>
                <div class="triangle"></div>
            </li>
            @endif






            @can("viewAny","App\Models\Setting")
            <li class="nav-item {{ current_page("admin/settings*") }}"><a class="nav-item-hold" href="{{ route("admin.settings.index") }}"><i class="nav-icon i-Gears"></i><span class="nav-text">@lang("pages.settings")</span></a>
                <div class="triangle"></div>
            </li>
            @endcan

        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="childNav" data-parent="admins">
            @can('superAdmin')
            <li class="nav-item {{ current_page("admin/admins*") }}"><a href="{{ route("admin.admins.index") }}"><i class="nav-icon i-Business-Man"></i><span class="item-name">@lang("pages.admins")</span></a></li>
            <li class="nav-item {{ current_page("admin/roles*") }}"><a href="{{ route("admin.roles.index") }}"><i class="nav-icon i-ID-2"></i><span class="item-name">@lang("pages.roles")</span></a></li>
            @endcan
        </ul>


        <ul class="childNav" data-parent="products">

            @can('viewAny', "App\Models\Product\Product")
            <li class="nav-item {{ current_page("admin/products*") }}"><a href="{{ route("admin.products.index") }}"><i class="nav-icon i-Shopping-Bag"></i><span class="item-name">@lang("pages.products")</span></a></li>
            @endcan

            @can('viewAny', "App\Models\Section")
            <li class="nav-item {{ current_page("admin/sections*") }}"><a href="{{ route("admin.sections.index") }}"><i class="nav-icon i-Tag-5"></i><span class="item-name">@lang("pages.sections")</span></a></li>
            @endcan
            @can('viewAny', "App\Models\Coupon")
            <li class="nav-item {{ current_page("admin/coupons*") }}"><a href="{{ route("admin.coupons.index") }}"><i class="nav-icon i-Tag-3"></i><span class="item-name">@lang("pages.coupons")</span></a></li>
            @endcan



        </ul>



        <ul class="childNav" data-parent="users">

            @can('viewAny', "App\Models\User\User")
            <li class="nav-item {{ current_page("admin/users*") }}"><a href="{{ route("admin.users.index") }}"><i class="nav-icon i-Mens"></i><span class="item-name">@lang("pages.users")</span></a></li>
            @endcan

            @can('viewAny', "App\Models\Order\Order")
            <li class="nav-item {{ current_page("admin/orders*") }}"><a href="{{ route("admin.orders.index") }}"><i class="nav-icon i-Check"></i><span class="item-name">@lang("pages.orders")</span></a></li>
            @endcan



        </ul>

        <ul class="childNav" data-parent="content">


            @can('viewAny',"App\Models\Slider" )
            <li class="nav-item {{ current_page("admin/sliders*") }}"><a href="{{ route("admin.sliders.index") }}"><i class="nav-icon i-Landscape"></i><span class="item-name">@lang("pages.sliders")</span></a></li>
            @endcan

        </ul>







    </div>
    <div class="sidebar-overlay"></div>
</div>