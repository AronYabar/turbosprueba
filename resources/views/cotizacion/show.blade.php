<html>
    <head>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
                
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                
           
                margin-top: 3.5cm;
                margin-left: 1.5cm;
                margin-right: 1cm;
                margin-bottom: 0cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 1cm;
                left: 1cm;
                right: 0cm;
                height: 3cm;
                
                display: block;
                margin-right: 1cm;
                width: 100%;
            }

            


            .tabla  {
                border-collapse:collapse;
                border-spacing:0;
                text-align: justify;
                font-size: 12px;
                color:#727374;
            }
            .line {
                width: 100%;
                height: 1px;
                margin-top: 0.3cm;
                margin-bottom: 0.3cm;
                background: #727374;
                
            }
            .line2 {
                width: 100%;
                height: 0.5px;
                background: #DA1400;
                
            }
            .celdaRoja{
                border-top-style:solid;
                border-top-color: #E74C3C;
                border-top-width: 0.5px;

                border-bottom-style:solid;
                border-bottom-color: #E74C3C;
                border-bottom-width: 0.5px;
            }
            
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        
        <header>
        <table width="100%" cellpadding="0" cellspacing="0">
    
            <tr>
                <td  width="70%"><img src="https://i.ibb.co/7C3gRhL/logo.jpg" width="230" height="75"/></td>
                <td width="15%"  align="right"style="font-size:x-large;color:#002699;"><strong>COTIZACIÓN</strong></td>
                <td width="15%" align="right" style="font-size:medium;color:red;"></strong>{{$ser->id}}</strong></td>
            </tr>
            <tr>
                <td width="70%" align="right"></td>
                <td width="15%"  align="center"style="font-size:medium;color:#002699;"><strong>FECHA</strong></td>
                <td width="15%" align="right" style="font-size:12px;color:#52527a;"><strong>{{@$ser->fecha}}</strong></td>
            </tr>

        </table>
            
        </header>

        

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <table width="100%" class="tabla">
                <tr>
                    <td width="100%" align="left"><strong >TURBO SERVICE CENTER S.A.C.</strong></td>
                </tr>
            </table>
            <table width="100%" class="tabla">
                <tr>
                    <td width="13%" align="right"><strong >RUC:</strong></td>
                    <td width="13%" align="right"><strong >20602362419</strong></td>
                    <td width="74%" align="right"><strong ></strong></td>
                </tr>
                <tr>
                    <td width="13%" align="right"><strong >TELEFONO:</strong></td>
                    <td width="13%" align="right"><strong >958556558</strong></td>
                    <td width="74%" align="right"><strong style="font-size: large;color:black">TOTAL S/. {{sprintf("%.2f",$ser->costo_total)}}</strong></td>
                </tr>
                <tr>
                    <td width="13%" align="right"><strong ></strong></td>
                    <td width="13%" align="right"><strong >988008184</strong></td>
                    <td width="74%" align="right"><strong ></strong></td>
                </tr>
            </table>
            <div class="line"></div>
            <table width="100%">
                <thead>
                <tr>
                    <th colspan="2" width="40%"align="left"style="font-size:medium;color:#002699;">Cliente</th>
                    <th colspan="2" width="30%"align="left"style="font-size:medium;color:#002699;">Turbo</th>
                    <th colspan="2" width="30%" align="left"style="font-size:medium;color:#002699;">Vehículo</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2"style="font-size:12px;color:#474747;">{{$ser->nombre}}{{"   "}}{{$ser->apellido_pate}}{{"  "}}{{$ser->apellido_mate}}</td>
                    <td style="font-size:12px;" align="left"><strong> MODELO:</strong></td>
                    <td style="font-size:12px;color:#474747;">{{@$ser->modelo}}</td>
                    <td style="font-size:12px;" align="left"><strong> MARCA:</strong> </td>
                    <td style="font-size:12px;color:#474747;">{{@$ser->marca}}</td>
                </tr>
                <tr>
                    <td style="font-size:12px;" align="left"><strong> DNI: </strong> </td>
                    <td style="font-size:12px;color:#474747;">{{@$ser->cliente_id}}</td>
                    <td style="font-size:12px;" align="left"><strong>N° PARTE:</strong></td>
                    <td style="font-size:12px;color:#474747;">{{$ser->turbo}}</td>
                    <td style="font-size:12px;" align="left"><strong>MOTOR:</strong></td>
                    <td style="font-size:12px;color:#474747;">{{@$ser->motor}}</td>
                </tr>
                <tr>
                    <td style="font-size:12px;" align="left"><strong>TELEFONO:</strong></td>
                    <td style="font-size:12px;color:#474747;">{{@$ser->nro_celular}}</td>
                    <td style="font-size:12px;"></td>
                    <td style="font-size:12px;"></td>
                    <td style="font-size:12px;" align="left"><strong>PLACA:</strong></td>
                    <td style="font-size:12px;color:#474747;">{{@$ser->placa}}</td>
                </tr>
                <tr>
                    <td style="font-size:12px;"align="left"><strong>CORREO:</strong></td>
                    <td style="font-size:12px;color:#474747;">{{@$ser->email}}</td>
                    <td style="font-size:12px;"align="right"><strong>ANTICIPO S/.</strong></td>
                    <td style="font-size:12px;color:#474747;">------</td>
                    <td style="font-size:12px;"align="right"><strong>SALDO S/.</strong></td>
                    <td style="font-size:12px;color:#474747;">------</td>
                </tr>
                </tbody>
            </table>
            <table width="100%">
            <tr>
                    <td style="font-size:12px;"align="left"><strong></strong></td>
                    <td style="font-size:12px;"></td>
                    <td style="font-size:12px;"align="left"><strong></strong></td>
                    <td style="font-size:12px;"></td>
                    <td style="font-size:12px;"align="left"><strong></strong></td>
                    <td style="font-size:12px;"></td>
                </tr>
            </table>
            <?php
                $var=json_decode(@$ser->descripcion);
                $var2=json_decode(@$ser->importe);
                $in=0;
            ?>
            <table width="100%" CELLPADDING="5">
                <tr>
                    <td width="80%" class="celdaRoja" style="font-size:medium;color:#002699;"align="left"><strong>DESCRIPCIÓN</strong></td>
                    <td width="20%" class="celdaRoja"style="font-size:medium;color:#002699;"align="left"><strong>IMPORTE</strong></td>
                </tr>
                @foreach( $var as $a)
               
                    <tr>
                        <td width="80%"style="font-size:12px"align="left"> {{$a}}</td>
                        @if(isset($var2[$in])==true)
                        <td width="20%"style="font-size:12px;"align="center"><?php print_r(sprintf("%.2f",@$var2[$in]));  ?></td>
                        @else
                        <td width="20%"style="font-size:12px;"align="center"></td>
                        @endif
                    </tr>
                
                <?php
                $in+=1;
                ?>
                @endforeach
                
                
            </table>
            <table width="100%" >
                @for ($i = 1; $i <=15; $i++)
                <tr>
                <td width="100%"  align="right"></td>
                </tr>
                @endfor
            </table>
            <table width="100%">
                <tr>
                    <td width="60%"style="font-size:medium;color:#002699;"align="left"><strong></strong></td>
                    <td width="20%"style="font-size:medium;color:#002699;"align="left"><strong>TOTAL S/.</strong></td>
                    <td width="20%"style="font-size:medium;color:#002699;"align="center"><strong>{{sprintf("%.2f",$ser->costo_total)}}</strong></td>
                </tr>
            </table>
            <table width="100%" >
                @for ($i = 1; $i <=70; $i++)
                <tr>
                <td width="100%"  align="right"></td>
                </tr>
                @endfor
            </table>
            <table width="100%">
                <thead>
                <tr>
                    <th rowspan="5"align="right" width="60%"><img src="https://i.ibb.co/Hg0MhDF/gracias.png" width="180" height="60"/></th>
                    <th width="100%"  align="left" width="40%" style="font-size:medium;color:#DA1400;"><strong>CONDICIONES Y FORMA DE PAGO<strong></th>
                </tr>
                @if(isset($ser->condicion1)==true)
                <tr>
                    <td style="font-size:12px;"> {{@$ser->condicion1}}</td>
                </tr>
                @else
                <tr>
                    <td style="font-size:12px;">CANCELADO AL TERMINO DEL TRABAJO</td>
                </tr>
                @endif
                @if(isset($ser->condicion2)==true)
                <tr>
                    <td style="font-size:12px;"> {{@$ser->condicion2}}</td>
                </tr>
                @else
                <tr>
                    <td style="font-size:12px;">CON UN PREVIO  ANTICIPO EN EFECTIVO</td>
                </tr>
                @endif
                
                </thead>
            </table>
            
            <table width="100%">
                <tr>
                    <td align="center" style="font-size:12px;color:#474747;" width="100%">Av. de la Cultura Mza. L Lote. 4 Urbanizasión Naciones Unidas San sebastian Cusco-Perú</td>
                </tr>
            </table>
            <div class="line2"></div>
            <table width="100%">
                <tr>
                    <td align="center" style="font-size:12px;" width="100%"><strong>La cotización tiene una validez de 30 días, o de acuerdo a disponibiidad de stock, precios sujetos a variaciones por posibles</strong></td>
                </tr>
            </table>
        </main>
    </body>
</html>