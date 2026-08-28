<div class="main_content_iner main_content_padding">
    <div class="dashboard_lg_card">
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-12">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 mb_40">
                                    <h3 class="custom_small_heading mb-0">{{ __('Shop Orders') }}</h3>
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-0">
                            <div class="col-3">
                                <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#shop_products" role="tab"
                                            data-toggle="tab">{{ __('Products') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#shop_books" role="tab" data-toggle="tab"
                                            id="tutors">{{ __('Books') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div> 

                        <div class="tab-content mt-4">
                            <div role="tabpanel" class="tab-pane fade show active" id="shop_products">
                                @if (count($orderProductsListing) == 0)
                                    <div class="col-12">
                                        <div class="section__title3 margin_50">
                                            <p class="text-center">{{ __('No Product Purchased Yet') }}!</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="">
                                                <table class="custom_table3 table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th scope="col">{{ __('common.SL') }}</th> -->
                                                            <th scope="col">{{ __('Order#') }}</th>
                                                            <th scope="col">{{ __('Product Title') }}</th>
                                                            <th scope="col">{{ __('Product Sub-Title') }}</th>
                                                            <!-- <th scope="col">{{ __('Actual Price') }}</th> -->
                                                            
                                                            <th scope="col">{{ __('Purchase Price') }}</th>
                                                            <th scope="col">{{ __('Discount Price') }}</th>
                                                            <th scope="col">{{ __('Order Status') }}</th>
                                                            <th scope="col">{{ __('Payment Status') }}</th>
                                                            <th scope="col">{{-- __('Action') --}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!empty($orderProductsListing))
                                                            @foreach ($orderProductsListing as $key => $order)
                                                                
                                                                <tr>
                                                                    <!-- <td scope="row">{{ $key + 1 }}</td> -->
                                                                    <td scope="row">order#{{ $order->id }}</td>
                                                                    <td>{{ $order->product->title ?? 'N/A' }}</td>
                                                                    <td>{{ $order->product->sub_title ?? 'N/A' }}</td>
                                                                    <td class="text-center">{{ number_format($order->purchase_price ?? 0, 2) }}</td>
                                                                    <td class="text-center">{{ number_format($order->discount_amount ?? 0, 2) }}</td>
                                                                    <td class="text-center">{{ $order->status_label ?? 'N/A' }}</td>
                                                                    <td class="text-center">
                                                                        @if (in_array($order->payment_status, [0,4]))
                                                                            <span class="badge rounded-pill bg-danger" style="padding:10px 20px; color:white;">{{ $order->payment_status_label ?? 'N/A' }}</span>    
                                                                        @elseif (in_array($order->payment_status, [1,3]))
                                                                            <span class="badge rounded-pill bg-success" style="padding:10px 20px; color:white;">{{ $order->payment_status_label ?? 'N/A' }}</span>
                                                                        @elseif ($order->payment_status == 2)
                                                                            <span class="badge rounded-pill bg-warning" style="padding:10px 20px; color:white;">{{ $order->payment_status_label ?? 'N/A' }}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a href="{{ route('myOrder.detail', $order->id) }}" class="link_value theme_btn small_btn4">{{ __('common.View') }}</a>
                                                                    </td>
                                                                </tr>
                                                                
                                                            @endforeach
                                                        @endif
                                                        
                                                    </tbody>
                                                </table>
                                                <div class="mt-4">
                                                    {{ $orderProductsListing->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="shop_books">
                                @if (count($orderBooksListing) == 0)
                                    <div class="col-12">
                                        <div class="section__title3 margin_50">
                                            <p class="text-center">{{ __('No Books Purchased Yet') }}!</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="">
                                                <table class="custom_table3 table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">{{ __('common.SL') }}</th>
                                                            <th scope="col">{{ __('Product Title') }}</th>
                                                            <th scope="col">{{ __('Product Sub-Title') }}</th>
                                                            <!-- <th scope="col">{{ __('Actual Price') }}</th> -->
                                                            
                                                            <th scope="col">{{ __('Purchase Price') }}</th>
                                                            <th scope="col">{{ __('Discount Price') }}</th>
                                                            <th scope="col">{{ __('Order Status') }}</th>
                                                            <th scope="col">{{ __('Payment Status') }}</th>
                                                            <th scope="col">{{-- __('Action') --}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!empty($orderBooksListing))
                                                            @foreach ($orderBooksListing as $key => $order)
                                                                
                                                                <tr>
                                                                    <td scope="row">{{ $key + 1 }}</td>
                                                                    <td>{{ $order->product->title ?? 'N/A' }}</td>
                                                                    <td>{{ $order->product->sub_title ?? 'N/A' }}</td>
                                                                    <td class="text-center">{{ number_format($order->purchase_price ?? 0, 2) }}</td>
                                                                    <td class="text-center">{{ number_format($order->discount_amount ?? 0, 2) }}</td>
                                                                    <!-- <td class="text-center">Placed</td> -->
                                                                    <td class="text-center">
                                                                        <span class="badge rounded-pill bg-success" style="padding:10px 20px; color:white;">Paid</span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a href="{{ $order->product->book_pdf }}" download class="link_value theme_btn small_btn4">{{ __('Download') }}</a>
                                                                    </td>
                                                                </tr>
                                                                
                                                            @endforeach
                                                        @endif
                                                        
                                                    </tbody>
                                                </table>
                                                <div class="mt-4">
                                                    {{ $orderBooksListing->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        

                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
