<div class="accessories-w3l" style="background: url({{ asset('styleWeb/img/imagenes/banner.jpg') }}) no-repeat 50% 0px; background-color: yellow">
    <div class="container">
        <h3 class="tittle" style="margin-top: 5%;">Mantenete informado con nuestro newsletter</h3>
        <br><br>
        <div class="content">
            {!! Form::open(['method' => 'POST','url' => ['/news_letter'],'style'=>'display:inline']) !!}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-sm-offset-2">
                    <div class="form-group">
                        <input type="text" name="name" id="first_name" class="form-control input-lg" placeholder="Nombre" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <input type="email" name="email" id="last_name" class="form-control input-lg" placeholder="Email" tabindex="2">
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  {{--  <div class="form-group">
                        {!! Recaptcha::render() !!}
                    </div>--}}
                    <div class="form-group">
                        <input type="submit" value="Alta" class="btn btn-primary btn-block btn-lg" tabindex="7">
                    </div>
                </div>
            </div>
            {!! Form::Close() !!}
        </div>
    </div>
</div>