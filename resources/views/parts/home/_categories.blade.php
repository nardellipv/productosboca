<section class="category-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img  src="{{ asset('images/categories/'.$category->photo) }}" class="img-responsive"  alt="{{ $category->name }}">
                                <a href="{{ url('categoria', $category->slug) }}" class="img-pop-up"
                                   target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">{{ $category->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>