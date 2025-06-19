@extends('admin.layouts.index')

@section('content')
<ul class="nav nav-tabs">
    @can('viewAny',"App\Models\Product\Repository")
    <li class="nav-item"><a class="nav-link {{ current_tab("#repository") }}" data-toggle="tab" href="#repository">@lang("labels.repository")</a></li>
    @endcan

    @can('viewAny',"App\Models\Product\Offer")
    <li class="nav-item"><a class="nav-link {{ current_tab("#offers") }}" data-toggle="tab" href="#offers">@lang("labels.offers")</a></li>
    @endcan

   
</ul>

<div class="tab-content">
    @can('viewAny',"App\Models\Product\Repository")
    <div class="tab-pane fade {{ current_tab("#repository") }}" id="repository" role="tabpanel">
        @can('create', "App\Models\Product\Repository")
        <h4 class="card-title mb-3">
            <a class="openRepositoryModal" data-type="in" data-modal_title="@lang('labels.add_to_repository')">
                <button class="btn btn-success">
                    <i class="i-Add"></i> {{__("labels.add_to_repository")}}
                </button>
            </a>

            <a class="openRepositoryModal" data-type="out" data-modal_title="@lang('labels.remove_from_repository')">
                <button class="btn btn-info">
                    <i class="i-Remove"></i> {{__("labels.remove_from_repository")}}
                </button>
            </a>
        </h4>

        {!! modal("addToRepositoryModal","admin.products.helpers.modals.repository",compact("product")) !!}

        @endcan

        <table class="display table table-striped table-bordered dt">
            <thead>
                <tr>
                    <th>@lang("validation.attributes.type") </th>
                    <th>@lang("validation.attributes.quantity") ( {{ $product->quantity }} ) </th>
                    <th>@lang("validation.attributes.note") </th>
                    <th>@lang("validation.attributes.created_at") </th>
                    <th>@lang("labels.options") </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->repositories as $repository)
                <tr class="table-{{ $repository->type=="in" ? "success" : "warning" }}">
                    <td>
                        @lang("labels.repositories_operations.$repository->type")
                    </td>
                    <td>{{$repository->quantity}}</td>

                    <td>{!! $repository->note !!}</td>
                    <td class="tooltips" title="{{$repository->created_at}}">{{$repository->created_at->format("Y-m-d")}}</td>
                    <td>



                        @can('delete',$repository)
                        <form method="POST" action="{{ route("admin.products.repositories.destroy",["product" => $product->id,"repository" =>$repository->id ]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
                            @csrf
                            @method("DELETE")
                            <i class="i-Remove"></i>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    @endcan

    @can('viewAny',"App\Models\Product\Offer")
    <div class="tab-pane fade {{ current_tab("#offers") }}" id="offers" role="tabpanel">

        @can('create', "App\Models\Product\Offer")
        <h4 class="card-title mb-3">
            <a href="{{ route('admin.products.offers.create',["product" => $product->id]) }}">
                <button class="btn btn-success">
                    <i class="i-Add"></i> {{__("labels.add")}}
                </button>
            </a>
        </h4>
        @endcan
        <table class="display table table-striped table-bordered dt">
            <thead>
                <tr>
                    <th>@lang("validation.attributes.begin_date")</th>
                    <th>@lang("validation.attributes.end_date")</th>
                    <th>@lang("validation.attributes.discount_percentage")</th>
                    <th>@lang("labels.options")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->offers as $offer)
                <tr>
                    <td>{{ $offer->begin_date->format("Y-m-d") }}</td>
                    <td>{{ $offer->end_date->format("Y-m-d") }}</td>
                    <td>{{ $offer->discount_percentage }} %</td>
                    <td>


                        @can('update', $offer)
                        <a href=" {{ route("admin.products.offers.edit",["product" => $product->id,"offer" => $offer->id]) }}" class="btn btn-primary btn-sm text-white tooltips" title="@lang('labels.edit')">
                            <i class="i-Pen-2"></i>
                        </a>
                        @endcan

                        @can('delete',$offer)
                        <form method="POST" action="{{ route("admin.products.offers.destroy",["product" => $product->id,"offer" => $offer->id]) }}" class="btn btn-danger btn-sm text-white tooltips confirm-form" title="@lang('labels.delete')">
                            @csrf
                            @method("DELETE")
                            <i class="i-Remove"></i>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endcan

 

</div>


@endsection