@extends('layouts.app')

@section('content')
    <br><br>
    <section class="contact_area section_gap_bottom">
        <div class="container">
            @include('layouts.alerts.success')
            @include('layouts.alerts.error')
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Buenos Aires, Argentina</h6>
                            <p>Somos una tienda Online, no poseemos tiendas físicas</p>
                        </div>
                        <br><br>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">info@bocaamerica.com</a></h6>
                            <p>Puedes escribirnos las 24hs los 365 días del año</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    {!! Form::open(['method' => 'POST','route' => ['sendEmail'],'class' => 'row contact_form']) !!}
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="EMail"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'EMail'"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="phone" placeholder="Teléfono"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Teléfono'"
                                   value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="mensaje" id="mensaje" rows="1" placeholder="Mensaje"
                                      onfocus="this.placeholder = ''"
                                      onblur="this.placeholder = 'Mensaje'"></textarea>
                        </div>
                        {!! Recaptcha::render() !!}
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="primary-btn">Enviar Mensaje</button>
                    </div>
                    {!! Form::Close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection