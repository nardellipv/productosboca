<div class="row">
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $countUsers }}</h3>

                <p>Usuario</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $countProduct }}</h3>

                <p>Cantidad Productos</p>
            </div>
            <div class="icon">
                <i class="fa fa-industry"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $countCategory }}</h3>

                <p>Cantidad Categorías</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Free Shipping</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            {!! Form::open(['method' => 'POST','route' => ['write']]) !!}
            {{ csrf_field() }}
            <div class="box-body">
               <p>Envio gratis supuerior a <b>${{ $costoEnvio }}</b></p>
                <div class="form-group">
                    <label for="value">Nuevo Valor</label>
                    <input type="text" name="value" class="form-control" id="value"
                           placeholder="Valor">
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Nuevo Valor</button>
            </div>
            {!! Form::Close() !!}
        </div>
    </div>
</div>