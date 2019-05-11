<section class="blog_categorie_area">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{ asset('images/categories/'.$category->photo) }}" alt="{{$category->name}}">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="{{ url('categoria', $category->slug) }}">
                                    <h5>{{ $category->name }}</h5>
                                </a>
                                <div class="border_line"></div>
                                {{--<p>Enjoy your social life together</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>