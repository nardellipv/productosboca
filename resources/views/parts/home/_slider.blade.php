<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Más Vendidos</h1>
                        <p>Productos de Boca Juniors más vendidos en el sitio y a un excelente precio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('parts.home._topSelling')
            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Nuevos Productos</h1>
                        <p>Nuevos productos e indumentaria de Boca Juniors.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('parts.home._newProducts')
            </div>
        </div>
    </div>
</section>