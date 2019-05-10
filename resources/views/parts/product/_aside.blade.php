<div class="sidebar-categories">
    <div class="head">Más Vendidos</div>
    <ul class="main-categories">
        @foreach($lastItems as $lastItem)
            <a href="{{ url('producto', $lastItem->slug) }}">
                <li class="main-nav-list">
                    <img class="img-responsive"
                         src="{{ asset('images/products/'.$lastItem->photo) }}"
                         alt="{{ $lastItem->name }}" width="35%">

                    {{ str_limit($lastItem->name, 15) }}
                </li>
                @if($lastItem->quantity == 0)
                    <b>Sin Stock</b>
                @endif
                @if($lastItem->offer)
                    <h6 style="text-align: end;">${{ $lastItem->offer }}</h6>
                    <del><h6 style="text-align: end;">${{ $lastItem->price }}</h6></del>
                @else
                    <h6 style="text-align: end;">${{ $lastItem->price }}</h6>
                @endif
            </a>
        @endforeach
    </ul>
</div>
<div class="sidebar-filter mt-50">
    <div class="top-filter-head">Cateogías</div>
    <div class="col-md-12 mt-sm-30" style="padding: 20px 15px;">
        <div class="">
            <ul class="unordered-list">
                @foreach($categories as $category)
                    <li>
                        <a href="{{ url('categoria', $category->slug) }}">
                            <label for="{{ $category->name }}">{{ $category->name }}</label>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>