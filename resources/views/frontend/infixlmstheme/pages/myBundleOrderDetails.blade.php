@extends(theme('layouts.dashboard_master'))
@section('title'){{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} | {{__('Bundle Order Details')}} @endsection
@section('css') @endsection
@section('js') @endsection

@section('mainContent')

    <div class="main_content_iner main_content_padding">
        <div class="dashboard_lg_card">
            <div class="container-fluid no-gutters">
                <div class="row">
                    <div class="col-12">
                        <div class="section__title3 mb_40">
                            <h3 class="custom_small_heading mb-0">{{ __('Bundle Order Details') }}</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="col-6">
                                    <a href="{{ route('myOrders') }}" style="color:#2ca6a4;">
                                        <i class="fa fa-arrow-left"></i>
                                        Back to Orders
                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                    @if ($firstOrder->status != 5)
                                        <a type="button" class="btn btn-rounded btn-warning admin-view-add"
                                            onclick="cancelBundleOrderSubmit('{{ route('myOrder.bundleCancel', [$firstOrder->tracking, $firstOrder->shop_bundle_id]) }}')">
                                            {{ __('Cancel Bundle') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row mb-5">
                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div>
                                            <strong>{{ $firstOrder->checkout->billing->first_name ?? '' }} {{ $firstOrder->checkout->billing->last_name ?? '' }}</strong>
                                        </div>
                                        <div>{{ $firstOrder->checkout->billing->email ?? ($firstOrder->user->email ?? '') }}</div>
                                        <div>{{ $firstOrder->checkout->billing->phone ?? 'N/A' }}</div>
                                        <div>{{ $firstOrder->checkout->billing->address1 ?? 'N/A' }}</div>
                                        <div>{{ $firstOrder->checkout->billing->countryDetails->name ?? '' }}</div>
                                    </div>
                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                        <div class="align-items-center">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>{{ __('Bundle') }}</strong></td>
                                                        <td class="text-right text-info text-bold">{{ $bundle->name ?? 'N/A' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>{{ __('Tracking') }}</strong></td>
                                                        <td class="text-right text-info text-bold">{{ $firstOrder->tracking }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>{{ __('Order status') }}</strong></td>
                                                        <td class="text-right"><span class="badge badge-inline badge-info">{{ $firstOrder->status_label }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>{{ __('Order date') }}</strong></td>
                                                        <td class="text-right">{{ date('d M Y', strtotime($firstOrder->created_at)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>{{ __('Items') }}</strong></td>
                                                        <td class="text-right">{{ $orderLines->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>{{ __('Total amount') }}</strong></td>
                                                        <td class="text-right">${{ number_format($grandTotal, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>{{ __('Payment method') }}</strong></td>
                                                        <td class="text-right">{{ strtoupper($firstOrder->checkout->payment_method ?? 'N/A') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>{{ __('Payment status') }}</strong></td>
                                                        <td class="text-right">{{ strtoupper($firstOrder->payment_status_label ?? 'PAID') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>{{ __('Product Name') }}</th>
                                                <th>{{ __('Type') }}</th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('Sub-Title') }}</th>
                                                <th class="right">{{ __('Price') }}</th>
                                                <th class="center">{{ __('Discount') }}</th>
                                                <th class="right">{{ __('Total') }}</th>
                                                <th class="center">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderLines as $index => $line)
                                                @php
                                                    $product = $line->product;
                                                    $type = (int) ($product->type ?? 0);
                                                    $downloadUrl = $product->book_pdf ?? null;
                                                    $canDownload = !empty($downloadUrl) && in_array($type, [2, 3, 4], true);
                                                    $imageSrc = isset($product->files[0]->file_path)
                                                        ? url($product->files[0]->file_path)
                                                        : url('public/assets/product-Placeholder.png');
                                                @endphp
                                                <tr>
                                                    <td class="center">{{ $index + 1 }}</td>
                                                    <td class="left strong">{{ $product->title ?? 'N/A' }}</td>
                                                    <td class="left">{{ $product->type_label ?? 'N/A' }}</td>
                                                    <td>
                                                        <img class="round-product-img" style="height:50px; width:50px;" src="{{ $imageSrc }}" alt="">
                                                    </td>
                                                    <td class="left">{{ $product->sub_title ?? 'N/A' }}</td>
                                                    <td class="right">${{ number_format($line->purchase_price + $line->discount_amount, 2) }}</td>
                                                    <td class="center">${{ number_format($line->discount_amount, 2) }}</td>
                                                    <td class="right">${{ number_format($line->purchase_price, 2) }}</td>
                                                    <td class="center">
                                                        @if ($canDownload)
                                                            <a href="{{ $downloadUrl }}" download class="link_value theme_btn small_btn4">{{ __('Download') }}</a>
                                                        @else
                                                            <a href="{{ route('myOrder.detail', $line->id) }}" class="link_value theme_btn small_btn4">{{ __('common.View') }}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"></div>
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left"><strong>{{ __('Subtotal') }}</strong></td>
                                                    <td class="text-right">${{ number_format($subtotal, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><strong>{{ __('Discount') }}:</strong></td>
                                                    <td class="text-right">${{ number_format($discountTotal, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><strong>{{ __('Total') }}</strong></td>
                                                    <td class="text-right"><strong>${{ number_format($grandTotal, 2) }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="bundleStatusForm" method="POST" action="" style="display:none;">
        @csrf
    </form>

    <script>
        function cancelBundleOrderSubmit(actionUrl) {
            if (actionUrl != '' && confirm('Cancel the entire bundle order? Individual items cannot be cancelled separately.')) {
                let form = document.getElementById('bundleStatusForm');
                form.action = actionUrl;
                form.submit();
            }
        }
    </script>
@endsection
