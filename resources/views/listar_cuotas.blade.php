<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1 style="padding-bottom: 30px">MODAL CUOTAS</h1>
	<table id="example" class="display nowrap" style="width:100%" >
	    <thead>
	        <tr>
	            <th style="background-color: green">Nº</th>
	            <th>Monto</th>
	            <th style="background-color: green">Valor Cuota</th>
	            <th>Fecha Vencimiento</th>
	            <th style="background-color: green">Nº Boleta</th>
	        </tr>
	    </thead>
	    <tbody>
 				@foreach ($cuotas as $p)
					<tr>
						<td>{{$p->n_cuota}}</td>
						<td>{{$p->monto}}</td>
						<td>{{$p->n_boleta}}</td>
						<td>{{$p->f_pago}}</td>
						<td>{{$p->n_boleta}}</td>
					</tr>
				@endforeach 
	    </tbody>
	</table>			
</body>
</html>