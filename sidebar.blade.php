<div id="sidebar" class="sidebar" role="complementary">
    @if(!\Jenssegers\Agent\Facades\Agent::isMobile())
    <aside class="widget widget_electro_products_filter">
        <h3 class="widget-title">Filters</h3>

            <aside class="widget woocommerce">
                <h3 class="widget-title">Brands</h3>
                <ul>
                    <div class="companies" id="company">
                        <ais-refinement-list attribute-name="company" :class-names="{
            'ais-refinement-list__count': 'badge',
            'ais-refinement-list__item': 'checkbox'
            }">
                        </ais-refinement-list>
                    </div>
                </ul>

            </aside>
            <aside class="widget woocommerce">
            <h3 class="widget-title">Storage</h3>
            <ul>
                <div class="storages">
                    <ais-refinement-list attribute-name="storage" :class-names="{
            'ais-refinement-list__count': 'badge',
            'ais-refinement-list__item': 'checkbox'
            }">
                    </ais-refinement-list>
                </div>
            </ul>

        </aside>

    </aside>
    @endif
    <aside class="widget widget_text">
        <div class="textwidget">
            <a href="https://www.phonefriend.in/store/oneplus">
                <img src="{{asset('assets/images/banner/ad-banner-sidebar.jpg')}}" alt="Banner" class="img img-responsive"></a>
        </div>
    </aside>

    <?php ?>

    <aside class="widget widget_products">
        <h3 class="widget-title">Sold within the last few minutes.</h3>
        <ul class="product_list_widget">
            @foreach($orders as $order)
                <?php $devices = \App\OrderDevice::where('order_id',$order->id)->take(2)->get(); ?>
            @foreach($devices as $device)
                <?php $certified = \App\Phone::where('id',$device->phone_id)->get(); ?>
            @foreach($certified as $certi)
                <li>
                        <img width="180" style="opacity: 0.7;" height="180" src="https://www.phonefriend.in/storage/{{str_replace("public", "", $certi->dp)}}" alt="" class="wp-post-image"/>
                        <span class="product-title"  style="opacity: 0.7;">{{ucwords($certi->data->company)}} {{$certi->data->model}} - {{$certi->data->storage}} GB</span>
                    <del><span class="amount"  style="opacity: 0.7;"><i class="fa fa-inr"></i> {{number_format($certi->data->price,2)}}</span></del>
                    <div class="price-add-to-cart">
                        <span class="onsale" style="background:rgb(209, 51, 65); opacity: 0.85;"><i class="icon-check-sign"></i>SOLD</span>
                        <span class="price">
                            <span class="electro-price"  style="opacity: 0.7;">
                                <ins><span class="amount"><i class="fa fa-inr"></i> {{ number_format($certi->price, 2) }}</span></ins>

                            </span>
                                </span>
                    </div>

                </li>
            @endforeach

                @endforeach
                @endforeach
        </ul>
    </aside>

</div>

