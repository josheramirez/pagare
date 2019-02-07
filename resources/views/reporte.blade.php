<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

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

 

<title>Vista ejemplo</title>
</head>
<body>
    <div style="padding: 40px">
 	   <h1 style="padding-bottom: 30px">REPORTES PAGARE</h1>
       <table id="example" class="display nowrap  dataTable" style="width:100%">
            <thead>
            	 <tr>
                    <th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_numero"><a class="toggle-vis" data-column="0" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_nombre"><a class="toggle-vis" data-column="1" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_rut"><a class="toggle-vis" data-column="2" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_domicilio"><a class="toggle-vis" data-column="3" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_poblacion"><a class="toggle-vis" data-column="4" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_comuna"><a class="toggle-vis" data-column="5" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="deudor_telefono"><a class="toggle-vis" data-column="6" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="paciente_nombre"><a class="toggle-vis" data-column="7" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="paciente_rut"><a class="toggle-vis" data-column="8" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="paciente_prevision"><a class="toggle-vis" data-column="9" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_fecha"><a class="toggle-vis" data-column="10" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_monto"><a class="toggle-vis" data-column="11" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_n_cuotas"><a class="toggle-vis" data-column="12" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_listar_cuotas"><a class="toggle-vis" data-column="13" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_valor_cuota"><a class="toggle-vis" data-column="14" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_vencimiento"><a class="toggle-vis" data-column="15" style="cursor: pointer;">ocultar</a></th>
					<th style="border-bottom:none; font-size: 12px; padding-top: 45px" id="pagare_saldo"><a class="toggle-vis" data-column="16" style="cursor: pointer;">ocultar</a></th>
				</tr >
                <tr>
                    <th>Nº</th>
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
                  	<th>Fecha Pagaré</th>
<!--                 
                    <th>Prestaciones</th>
                    <th>Valor Cancelado</th>
                    <th>N° Boleta o Bono</th> -->
                    <th>Monto</th>
                    <th>N° de cuotas</th>
                    <th class="noExport">Listar cuotas</th>
                    <th>Valor Cuota</th>
                    <th>Vencimiento</th>
                    <th>Total Adeudado</th>
                   
                </tr>
            </thead>
            <tbody>
				@foreach ($lista_pagares as $p)
					<tr>
						<td>{{$p->codigo}}</td>
						<td>{{$p->deudor_nombre}}</td>
						<td>{{$p->rut."-".$p->dv}}</td>
						<td>{{$p->calle." ".$p->numero}}</td>
						<td>{{$p->poblacion}}</td>
						<td>{{$p->comuna}}</td>
						<td>{{$p->fono}}</td>
						<td>{{$p->paciente_nombre}}</td>
						<td>{{$p->paciente_rut."-".$p->paciente_dv}}</td>
						<td>{{$p->prevision}}</td>
						<td>{{$p->fecha}}</td>
						<td>{{$p->total}}</td>
						<td>{{$p->n_cuota}}</td>
<!--  						<td><li><a  href="{{ url('/listar_cuotas/'. $p->id) }}">Ver Cuotas</a></li></td>  -->




						<td>   
						    <span><li style="list-style-type: none"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#yourModal{{$p->id}}" style="font-size: 14px; padding: 2px; padding-left: 20px; padding-right: 20px;">Ver cuotas</li></span>
							    <div class="modal fade" id="yourModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							      <div class="modal-dialog" role="document" style=" top: 15%;">
							        <div class="modal-content">

							          <div class="modal-header">
							            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							            <h4 class="modal-title" id="myModalLabel">Lista de Cuotas {{$p->rut}}</h4>
							            	<?php 
							            		$p_cuotas=DB::table('cuotas')->where('deuda_id', $p->id)->get();
							            	?>
							          </div>

							          <div class="modal-body">
							          	<table id="example" class="display nowrap" style="width:100%" >
										    <thead>
										        <tr>
										            <th style="">Nº</th>
										            <th>Monto</th>
										            <th style="">Valor Cuota</th>
										            <th>Fecha Vencimiento</th>
										            <th style="">Nº Boleta</th>
										        </tr>
										    </thead>
										    <tbody>
									 			@foreach ($p_cuotas as $k)
													<tr>
														<td>{{$k->n_cuota}}</td>
														<td>{{$k->monto}}</td>
														<td>{{$k->n_boleta}}</td>
														<td>{{$k->f_pago}}</td>
														<td>{{$k->n_boleta}}</td>
													</tr>
												@endforeach 		
											</tbody>
										</table>			
							            {{$p->rut}}
							          </div>

							          <div class="modal-footer">
							            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<!-- 							            <button type="button" class="btn btn-primary">Save changes</button>
 -->							          </div>

							        </div>
							      </div>
							    </div>
						</td>

						<td>{{$p->valor_cuota}}</td>
						<td>{{$p->vencimiento}}</td>
						<td>{{$p->saldo}}</td>

					</tr>
				@endforeach
            </tbody>
        </table>
    </div>

</body>

<style>

#example_length{margin-top: 20px }
.dt-buttons{}



</style>




<script>
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

      

</script>

 </html>