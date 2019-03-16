<div class="latest-w3">
    <div class="container">
        {{--<h3 class="tittle1">Categorías</h3>--}}
        <div class="latest-grids">
            @foreach($categories as $category)
            <div class="col-md-3 latest-grid">
                <div class="latest-top">
                    <a href="{{ url('categoria', $category->slug) }}">
                    <img  src="{{ asset('images/categories/'.$category->photo) }}" class="img-responsive"  alt="{{ $category->name }}">
                    </a>
                    <div class="latest-text">
                        <h4>{{ $category->name }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>