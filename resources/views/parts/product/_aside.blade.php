<div class="col-md-3 product-agileinfo-grid">
    <div class="top-rates">
        <h3>Más vendidos</h3>
        @foreach($lastItems as $lastItem)
            <div class="recent-grids">
                <div class="recent-left">
                    <a href="{{ url('producto', $lastItem->slug) }}"><img class="img-responsive "
                                                                          src="{{ asset('images/thumbnail/'.$lastItem->photo) }}"
                                                                          alt=""></a>
                </div>
                <div class="recent-right">
                    <h6 class="best2"><a href="{{ url('producto', $lastItem->slug) }}">{{ $lastItem->name }}</a></h6>
                    @if($lastItem->offer)
                        <del>${{ $lastItem->price }}</del>
                        <h4 class="item_price" style="display: inline;">${{ $lastItem->offer }}</h4>
                    @else
                        <p><em class="item_price" style="display: inline;">${{ $lastItem->offer }}</em>
                    @endif
                    <div class="block star-rating" style="display: table-row;">
                        <div class="back-stars small ghosting">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>

                            <div class="front-stars" style="width: {{$lastItem->rating}}%">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforeach
    </div>
    {{--    <div class="cat-img">
            <img class="img-responsive " src="{{ asset('styleWeb/images/45.jpg') }}" alt="">
        </div>--}}
</div>