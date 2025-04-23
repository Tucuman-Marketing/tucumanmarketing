<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .center {
            text-align: center;
        }

        .stl_03 {
            position: relative;
        }

        .stl_04 {


            padding-right: 200px clip: rect(0.125em, 45.16667em, 65.14584em, -0.041667em);
            position: absolute;
            pointer-events: none;
        }



        .bg {
            position: fixed;
            top: -60;
            left: -35;


            /* Preserve aspet ratio */
            min-width: 100%;
            min-height: 100%;
        }




        .posicion-center {
            /* padding-top: -200px;*/
            top: -60;

        }


        .flo1 {

            position: absolute;
            width: 100%;
            top: 845px;
            font-size: 15px
        }

        .flo2 {

            position: absolute;
            width: 100%;
            top: 900px;
            font-size: 11px
        }

        .factura {
            position: absolute;
            padding-left: 350;
            top: 10px;
            font-size: 40px
        }

        .tipo-factura {
            position: absolute;
            padding-left: 258;
            top: -30px;
            font-size: 40px
        }
    </style>

</head>

<body>

    <div class="center">
        <img src="{{url('storage/factura/imagen.png')}}"  class="stl_04 bg"  width="800px" />
    </div>

    {{-- <table width="100%">
        <tr>
            <td class="center">
                <h3>{{$venta->venta_tipo}}</h3>
            </td>

        </tr>
    </table>
    --}}

    <div class="factura">
        <p>FACTURA</p>
    </div>


    <table width="100%" class="posicion">
        <tr>
            <td valign="top" style="width:100%;padding-top: -10;padding-left: 60;"><img src="{{url('storage/factura/logo.png')}}" class="img-rounded logo"
                    height="100" width="150">
            </td>
        </tr>
    </table>

    <div class="tipo-factura">
        <p>A</p>
    </div>


    <table width="100%">
        <tr>
            <td width="60%" style="padding-top: -30;">
                <h3>IVA RESPONSABLE INSCRIPTO</h3>
                <strong>Fecha:</strong> <br>
                <strong>Direccion:</strong> <br>
                <strong>Provincia:</strong> Tucuman <br>
                <strong>Ciudad:</strong> San Miguel de Tucuman <br>
                <strong>Telefono:</strong> <a href=""></a>
                <strong>Email:</strong> <a href=""></a><br>
                <strong>Website:</strong> <a
                    href="https://www.sharkinformatica.com">https://www.sharkinformatica.com</a><br>
            </td>

            <td style="font-size: 15px;">
                <h3>Nº: 000</h3>
                <strong> Fecha de Emisión:</strong> <br>
                <strong> C.U.I.T. Nº:</strong>20-36349598-3<br>
                <strong> Ing. Brutos Nº:</strong>20-36349598-3<br>
                <strong> Inicio de Actividad:</strong>01/04/2019<br><br><br>
            </td>
        </tr>
    </table>


    <table width="100%">
        <tr>{{--Fila--}}

            <td width="100%">


                <strong>Razon Social:</strong>

                <strong>Cond. IVA:</strong>
                <strong> :</strong>
                <strong>Cond. Pago:</strong><br>
                {{-- @if($venta->user != null)
                <strong>Provincia:</strong>{{$venta->user->facturacion->first()->provincia}}
                <strong>Localidad:</strong>{{$venta->user->facturacion->first()->ciudad}}
                <strong>Cp:</strong> {{$venta->user->facturacion->first()->cp}}
                @endif --}}

                <strong>Direccion de Facturacion:</strong>


            </td>


        </tr>



    </table>

    <br />

    <table width="100%" style="font-size: 12px;">
        <thead style="background-color: lightgray;">
            <tr>
                <th>Concepto</th>
                <th>Periodo</th>
                <th>Año</th>
                <th align="right">Total</th>
            </tr>
        </thead>
        <tbody>

            @foreach($receipt->details as $transaction)
            <tr>
                <td>{{ $transaction->concept }}</td>
                <td>{{ $transaction->period }}</td>
                <td>{{ $transaction->year }}</td>
                <td>$ {{ $transaction->total }}</td>

                {{-- <td align="right">{{ $transaction->cantidad }}</td>
                <td align="right">{{ $transaction->producto->iva }}</td>
                <td align="right">${{ $transaction->precio_venta_pesos_s_iva }}</td>
                <td align="right">${{ $transaction->subtotal }}</td> --}}
            </tr>
            @endforeach

        </tbody>
    </table>


    <br>

    <table width="100%" {{-- style="font-size: 15px;padding-top: 345 --}} class=" flo1">
        <thead style="background-color: lightgray;">
            <tr>

                <th>NETO: </th>
                <th>RECARGO:</th>
                <th>DESCUENTO:</th>
                {{-- <th>SUBTOTAL:</th> --}}
                <th>IVA 21%:</th>
                <th>IVA 10,5%:</th>
                <th>TOTAL:</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>

                <td align="right">$</td>
                <td align="right">+ $</td>
                <td align="right">- $</td>
                <td align="right">+ $</td>
                <td align="right">+ $</td>

                {{-- @if($venta->importe_recargo_tarjeta > 0 )
                <td align="right">${{ $venta->total_pagar_efectivo + $venta->total_pagar_tarjeta}}</td>
                @else --}}
                <td align="right">${{ $receipt->total}}</td>
               
            </tr>

        </tbody>
    </table>

    <br>

    {{-- @php
    $formato = 'd/m/Y';
    $dia = substr($venta->FeAffip->vencimiento_cae, 6);
    $mes = substr($venta->FeAffip->vencimiento_cae, 4, 2);
    $año = substr($venta->FeAffip->vencimiento_cae, 0, 4);
    @endphp --}}


    {{-- <table width="100%" class="flo2">
        <thead>
            <tr>
                <th width="50%">

                    <img style="padding-top: 20;"
                        src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(80)->generate($venta->FeAffip->codigo_de_barras)) !!} ">
                    <br>
                    {{ $venta->FeAffip->codigo_de_barras }}
                </th>
                <th>CAE: {{ $venta->FeAffip->cae }} <br>
                    FECHA VENC. CAE: {{ $dia }}/{{ $mes }}/{{ $año }}</th>

            </tr>
        </thead>
    </table> --}}


    {{-- @if($venta->pago_tipo == "Tarjeta de Credito")

    <table width="30%" style="float: right;">


        <tr align="right">
            <td class="gray">Total con tarjeta: </td>
            <td class="gray">${{$venta->total_pagar_tarjeta}}</td>
        </tr>

        <tr align="right">
            <td class="gray">Cantidad de cuotas: </td>
            <td class="gray">{{$venta->cantidad_de_cuotas}}</td>
        </tr>

    </table>

    @endif --}}


    {{--
    @if($venta->pago_tipo == "Pagos Multiples")

    <table width="40%" style="float: right;">
        <tr align="right">
            <td class="gray">Total Pagado En Efectivo: </td>
            <td class="gray">${{$venta->total_pagar_efectivo}}</td>
        </tr>

        <tr align="right">
            <td class="gray">Total Pagado En Tarjeta: </td>
            <td class="gray">${{$venta->total_pagar_tarjeta}}</td>
        </tr>

        <tr align="right">
            <td class="gray">Cantidad de Cuotas: </td>
            <td class="gray">{{$venta->cantidad_de_cuotas}}</td>
        </tr>
    </table>

    @endif --}}



</body>

</html>