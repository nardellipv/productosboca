@if (count($errors) > 0)
    <section id="directory-category" class="p_b70 p_t70">
        <div class="container">
            <div class="row">
                <div class="col-md-12 directory-category-heading">
                    <h4>Revise los siguientes <span>Errores</span></h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="fa fa-ban"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endif