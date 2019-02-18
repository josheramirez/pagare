@extends('layouts.app')
@section('content')

<!-- Styles -->
   <style>

       body {
    font-size: 12px;
    font-family: brownFont;
    padding-right: 0 !important ;
}

   </style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/script.js"></script>



<div id="app">
     <div style="padding: 40px;">
       <h1 style="padding-bottom: 30px">REPORTES PAGARE</h1>
       <table id="example" class="display nowrap  dataTable" style="width:100%;" >
            <thead>
                 <tr>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_numero"><a class="toggle-vis" data-column="0" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_nombre"><a class="toggle-vis" data-column="1" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_rut"><a class="toggle-vis" data-column="2" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_domicilio"><a class="toggle-vis" data-column="3" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_poblacion"><a class="toggle-vis" data-column="4" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_comuna"><a class="toggle-vis" data-column="5" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_telefono"><a class="toggle-vis" data-column="6" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="paciente_nombre"><a class="toggle-vis" data-column="7" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="paciente_rut"><a class="toggle-vis" data-column="8" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="paciente_prevision"><a class="toggle-vis" data-column="9" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_fecha"><a class="toggle-vis" data-column="10" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_monto"><a class="toggle-vis" data-column="11" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="por_pagar" class="toggle-vis" data-column="12" style="cursor: pointer;color:#337ab7">ocultar</a></th>

                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_n_cuotas"><a class="toggle-vis" data-column="13" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_listar_cuotas"><a class="toggle-vis" data-column="14" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_valor_cuota"><a class="toggle-vis" data-column="15" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_vencimiento"><a class="toggle-vis" data-column="16" style="cursor: pointer;color:#337ab7">ocultar</a></th>
                </tr >
                <tr>
                   <th>N° pagare</th>
                    <!-- DATOS DEL DEUDOR -->
                    <th>Nombre deudor</th>
                    <th>Rut deudor</th>
                    <th>Domicilio deudor</th>
                    <th>Población-Villa</th>
                    <th>Comuna</th>
                    <th>Teléfono deudor</th>
                    <!-- DATOS DEL PACIENTE -->
                    <th>Nombre paciente</th>
                    <th>Rut paciente</th>
                    <th>Previsión paciente</th>
                    <th>Fecha creacion</th>
                    <th style=" padding-left: 10px">Estado de Pago</th>
<!--                 
                    <th>Prestaciones</th>
                    <th>Valor Cancelado</th>
                    <th>N° Boleta o Bono</th> -->
                    <th>$ Deuda</th>
                    <th>$ Por pagar</th>
                    <th>N° de cuotas</th>
                    <th class="noExport">Listar cuotas</th>
                    {{--<th>Valor Cuota</th>--}}
                    <th>Vencimiento</th>
                    <!-- <th>Total Adeudado</th>
                    -->
                </tr>
            </thead>
            <tbody>
                @foreach ($lista_pagares as $p)
                    <tr>
                        <td>{{$p->numeracion}}</td>
                        <td>{{$p->deudor_nombre}}</td>
                        <td>{{$p->rut."-".$p->dv}}</td>
                        <td>{{$p->calle." ".$p->numero}}</td>
                        <td>{{$p->poblacion}}</td>
                        <td>{{$p->comuna}}</td>
                        <td>{{$p->fono}}</td>
                        <td>{{$p->paciente_nombre}}</td>
                        <td>{{$p->paciente_rut."-".$p->paciente_dv}}</td>
                        <td>{{$p->prevision}}</td>
                       

                        <td>{{\Carbon\Carbon::parse($p->fecha)->format('Y-m-d')}}</td>
                        {{--<td>{{$p->fecha}}</td>--}}

                        <?php 
                            
                            $p_cuotas=DB::table('cuotas')->where('deuda_id', $p->id)->get();
                            $primera_cuota=$p_cuotas->first();
                            
                            // no hay deuda (es ABONO)
                            if($p->total==null){
                                $monto_pagado=$p_cuotas->sum('monto');
                                // hay abonos echos
                                if($monto_pagado>0){
                                    $saldo_deuda=-1000;
                                }
                                // no hay abonos hechos
                                else{
                                    $saldo_deuda=-2000;    
                                }
                            }else{
                                $monto_pagado=$p_cuotas->sum('monto_pagado');
                                $saldo_deuda=$p->total-$monto_pagado;
                            }

                            if($p->estado_id==3){
                                 $saldo_deuda=-3000;
                            }
                          
                        ?>



                        <td data-sort="<?php echo $saldo_deuda?>">
                            <?php   

                            if($p->estado_id==3){ ?>
                                <button type="button" class="btn btn-danger btn-lg" style="font-size: 14px; padding:0px; padding-left: 16px; padding-right: 16px;">Anulado</button>
                            <?php 
                            }else{ ?>
                                
                                <?php 
                                if($p->judicial==1){?>
                                    <button type="button" class="btn btn-default btn-lg" style="font-size: 14px; padding:0px; padding-left: 19px; padding-right: 19px;background-color: #ff8000;color: #ffffff">Judicial</button>
                                    
                                <?php 
                                }else{

                                        if($saldo_deuda>10){ ?>
                                            <button type="button" class="btn btn-warning btn-lg" style="font-size: 14px; padding:0px; padding-left: 10px; padding-right: 11px;">Pendiente</button>
                                        <?php } 
                                        if($saldo_deuda<=10 && $saldo_deuda>=-100){ ?>
                                            <button type="button" class="btn btn-success btn-lg" style="font-size: 14px; padding:0px; padding-left: 19px; padding-right: 19px;">Pagado</button>
                                        <?php } 
                                         if($saldo_deuda==-1000){ ?>
                                            <button type="button" class="btn btn-purple btn-lg" style="font-size: 14px; padding:0px; padding-left: 13px; padding-right: 13px; background-color: #742CD1;color: #ffffff">Abonado</button>
                                        <?php } 
                                        if($saldo_deuda==-2000){ ?>
                                            <button type="button" class="btn btn-info btn-lg" style="font-size: 14px; padding:0px; padding-left: 20px; padding-right: 20px;">Abierto</button>
                                        <?php } 
                                }
                                ?>     

                            <?php 
                            } 
                            ?>

                               

                        </td>


<!-- CODIGO ANTIGUO

                        <td>{{$p->fecha}}</td>
                        <td data-sort="<?php echo $p->estado_id ?>">
                            <?php   if($p->estado_id==1){ ?>
                             <button type="button" class="btn btn-warning btn-lg" style="font-size: 14px; padding:0px; padding-left: 10px; padding-right: 10px;">Sin validar
                            <?php } if($p->estado_id==2){ ?>
                            <button type="button" class="btn btn-success btn-lg" style="font-size: 14px; padding:0px; padding-left: 15px; padding-right: 15px;"> Validado 
                            <?php } if($p->estado_id==3){ ?>
                            <button type="button" class="btn btn-danger btn-lg" style="font-size: 14px; padding:0px; padding-left: 16px; padding-right: 16px;"> Anulado
                            <?php } ?> 

                        </td>

-->


                        <!-- MONTO DEUDA -->
                        <td><strong>{{ number_format($p->total, 0, ',', '.')}}</strong></td>
                        
                        <!-- MONTO POR PAGAR -->
                        @if($saldo_deuda>10 or $saldo_deuda<=10 && $saldo_deuda>=-100)
                            @if($saldo_deuda>10)
                                <td><strong>{{ number_format($saldo_deuda, 0, ',', '.')}}</strong></td>
                            @else($saldo_deuda<=10 && $saldo_deuda>=-100)
                             <td><strong>0</strong></td>
                            @endif
                        @else
                            <td></td>
                        @endif

                        <!-- N° DE CUOTAS DE LA DEUDA -->
                        <td>{{$p->n_cuota}}</td>

                        <td data-sort="<?php echo $p->n_cuota ?>">   
                            <span><li style="list-style-type: none"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#yourModal{{$p->id}}" style="font-size: 14px; padding:0px; padding-left: 10px; padding-right: 10px;" id="boton_lista{{$p->id}}">Ver cuotas</li></span>
                                <div class="modal fade modal-on" id="yourModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >



<!-- MODAL  -->
                                  <div class="modal-dialog modal-lg" role="document" style=" top: 0%; width: 800px;">
                                   <script>
                                       var boton_lista_js= document.getElementById("boton_lista{{$p->id}}");
                                       <?php  
                                            //if ($p->n_cuota<1) {

                                            //hay cuotas?
                                            if ($p_cuotas->count()>0){
                                                //hay solo una cuota
                                                if($p_cuotas->count()<2){
                                                    //hay una sola cuota y es de abono
                                                    if($primera_cuota->n_cuota==0) {
                                                        ?>       
                                                        boton_lista_js.disabled=true;
                                                        <?php                   
                                                    }
                                                    else{
                                                        if($p->total==null){
                                                            ?>       
                                                            boton_lista_js.disabled=true;
                                                            <?php     
                                                        }
                                                    }
                                                // hay 2 o mas cuotas
                                                }else{

                                                }
                                            // no hay cuotas
                                            }else{
                                                ?>       
                                                boton_lista_js.disabled=true;
                                                <?php  
                                            }
                                       ?>
                                       
                                   </script>
                                    <div class="modal-content">

                                      <div class="modal-header">
                                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                                        <h4 class="modal-title" id="myModalLabel">Lista de Cuotas <strong>{{$p->deudor_nombre}}</strong></h4>
                                            <?php 
                                                //$p_cuotas=DB::table('cuotas')->where('deuda_id', $p->id)->get();
                                            ?>
                                      </div>

                                      <div class="modal-body">
                                        <table id="example" class="display nowrap" style="width:100%" >
                                            <thead>
                                                <tr>
                                                    <!--<th style="">Nº</th>-->
                                                    <th>N° cuota</th>
                                                    <th style="">Valor Cancelado</th>
                                                    <th>F. Vencimiento</th>
                                                    <th style="">Nº Boleta</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($p_cuotas as $k)

                                                <?php  
                                                    if($k->n_cuota==0||$k->estado=="antiguo"){continue;}
                                                ?>
                                                    <tr>
                                                        
                                                        <td>{{$k->n_cuota}}</td>
                                                        <?php 
 $dato=number_format($k->monto_pagado, 0, ',', '.');
                                                        ?>
                                                       
                                                        
                                                        <td><strong>{{$dato}}</strong></td>
                                                        <td>{{$k->f_vencimiento}}</td>
                                                        <td>{{$k->n_boleta}}</td>
                                                        <td>
                                                            <?php   if($k->estado=="pendiente"){ ?>
                                                                    <button type="button" class="btn btn-warning btn-lg" style="font-size: 14px; padding:0px; padding-left: 7px; padding-right: 7px;">Pendiente
                                                            <?php } if($k->estado=="pagado"){ ?>
                                                                    <button type="button" class="btn btn-success btn-lg" style="font-size: 14px; padding:0px; padding-left: 15px; padding-right: 15px;">Pagado
                                                            <?php } if($k->estado=="anulado"){ ?>
                                                                    <button type="button" class="btn btn-danger btn-lg" style="font-size: 14px; padding:0px; padding-left: 16px; padding-right: 16px;">Anulado
                                                            <?php } ?>




                                                        </td>
                                                    </tr>
                                                @endforeach         
                                            </tbody>
                                        </table>            
                                        <!--{{$p->rut}}-->
                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                                      </div>

                                    </div>
                                  </div>
                                </div>
                        </td>

                        {{--<td><strong>{{$p->valor_cuota}}</strong></td>--}}
                        <td>{{$p->vencimiento}}</td>
                        <!-- <td>{{$p->saldo}}</td> -->

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')

<style>
    #example_length{
        margin-top: 20px
    }
    .toggle-vis{
        
        color: #337ab7
    }

   
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<!-- Latest compiled and minified CSS 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

<!-- Optional theme 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>


<script type="text/javascript">
       $(document).ready(function() {
            $('#example').DataTable( {
            
            // permite escroll en eje x (horizontal)
            "scrollX": true,
            // cantidad de elementos a mostrarce en la tabla
             "iDisplayLength": 25,


             // l es el show entry, numero de filas a mostrar
             // p es el paginador
             // i es el aviso contador de filas
             // t es el scroll
             // p aviso de espera de procesamiento y carga de datos
             // f es el filtro buscador 
             // B botones

             dom: 'Bfrtlip',
        buttons: [
                
                {
                extend: 'colvis',
                text: 'Columnas',
                columns: ':not(.noVis)'
                },
                { 
                    extend: 'copyHtml5',
                    text: 'Copiar',
                    title: 'Reporte Pagares',
                     exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    title: 'Reporte Pagares',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }

                ],
        language: {

                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "Buscar:",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":    "Último",
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },


                buttons: {
                copyTitle: 'Tabla Copiada ',
                copyKeys: 'Appuyez sur <i>ctrl</i> ou <i>\u2318</i> + <i>C</i> pour copier les données du tableau à votre presse-papiers. <br><br>Pour annuler, cliquez sur ce message ou appuyez sur Echap.',
                copySuccess:{
                            _: '%d filas han sido copiadas',
                            1: '1 linr'
                            }
                }
        }

             });
        } );


       $(document).ready(function() {
            var table = $('#example').DataTable();
         
            $('#example tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );
         
            $('#button').click( function () {
                table.row('.selected').remove().draw( false );
            } );

            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();
         
                // Get the column API object
                var column = table.column( $(this).attr('data-column') );
         
                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        } );

      


    $('.modal-on').on('hidden.bs.modal', function () {
      
      document.body.style.paddingRight = "0px"; 
    });


</script>
@endsection
