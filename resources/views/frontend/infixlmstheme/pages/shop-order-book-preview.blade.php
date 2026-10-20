@extends(theme('layouts.dashboard_master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontend.Preview') }}
@endsection
@section('css')
    <style>
        .shop-book-preview-wrap {
            min-height: calc(100vh - 220px);
        }
        .shop-book-preview-frame {
            width: 100%;
            min-height: calc(100vh - 280px);
            border: 1px solid #e8e8e8;
            border-radius: 8px;
            background: #f5f5f5;
        }
    </style>
@endsection

@section('mainContent')
    <div class="main_content_iner main_content_padding">
        <div class="dashboard_lg_card">
            <div class="container-fluid no-gutters">
                <div class="p-4 shop-book-preview-wrap">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                        <div>
                            <h3 class="custom_small_heading mb-1">{{ $product->title ?? __('Book') }}</h3>
                            @if (!empty($product->sub_title))
                                <p class="mb-0 text-muted">{{ $product->sub_title }}</p>
                            @endif
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('myOrders') }}" class="link_value theme_btn small_btn4 mr-2">{{ __('Back') }}</a>
                            <a href="{{ route('myOrder.bookDownload', $order->id) }}" class="link_value theme_btn small_btn4">{{ __('common.Download') }}</a>
                        </div>
                    </div>
                    <iframe
                        class="shop-book-preview-frame"
                        src="{{ $pdfStreamUrl }}"
                        title="{{ $product->title ?? 'PDF preview' }}"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
