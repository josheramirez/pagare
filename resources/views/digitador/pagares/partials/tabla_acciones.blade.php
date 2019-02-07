<br>
<div class="card">
    <div class="card-header">
        Acciones
    </div>
    <div class="card-body">
        @if( $pagare->estado_id == 1 && $pagare->numeracion == null)
            <h5 class="card-title">Validar Pagare</h5>
            <p class="card-text">
                {!! Form::model($pagare, ['route'=> ['pagare.estado.update', $pagare], 'method' => 'PUT', 'id' => 'from1']) !!}
                {!! Form::hidden('estado_id', null) !!}
                Si el pagare no necesita más modificaciones presione el siguiente boton.
                {!! Form::submit('Validar Pagare', ['class' => 'btn btn-info', 'id' =>'btn-submit']) !!}
                {!! Form::close() !!}
            </p>
            <hr>
        @endif
        <h5 class="card-title">Imprimir Pagare</h5>
        <p class="card-text">
            Para imprimir o visualizar el pagare presione el siguiente boton.
            <a href="{{ route('pagare.print', [$pagare->id]) }}" class="btn btn-primary">Imprimir Pagare</a>
        </p>

<hr>

<!-- OBSERVACIONES-->
     
<?php  
    if($observaciones->count()>0){
?>
<h5 class="card-title">Observaciones</h5>
        <p class="card-text">
         Revise el historico de las observaciones realizadas a este pagare, presione el siguiente boton
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#yourModal{{$pagare->id}}" style="font-size: 13px; padding:6px; padding-left: 10px; padding-right: 10px;padding-bottom: -1px;" id="boton_lista{{$pagare->id}}">Mostrar Historico</button>
        </p>
                                
        <!-- MODAL HISTORICO-->
        <div class="modal fade modal-on" id="yourModal{{$pagare->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
          <div class="modal-dialog modal-lg" role="document" style=" top: 0%; width: 100%;">
           

           <script>
               var boton_lista_js= document.getElementById("boton_lista{{$pagare->id}}");
                   
                   <?php  
                        if ($observaciones->count()<1) {
                    ?>       
                       boton_lista_js.disabled=true;
                    <?php  
                   }
                   ?>
           </script>

            <div class="modal-content">

              <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title" id="myModalLabel">Observaciones Pagare N° <strong>{{$pagare->numeracion}}</strong></h4>
              </div>

              <div class="modal-body">
                <table id="example" class="table table-hover table-bordered" style="width:100%; table-layout: fixed" >
                    <thead>
                        <tr>
                            <!--<th style="">Nº</th>-->
                            <th style="width: 15%">Fecha creacion</th>
                            <th style="">Observacion</th>
                            <th style="width: 25%">Creado por</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($observaciones as $k)
                            <tr>
                                
                                <td>{{\Carbon\Carbon::parse($k->created_at)->format('d-m-Y')}}</td>
                                <td>{{$k->observacion}}</td>
                                <td>{{$k->usuario->full_nombre}}</td>
                            </tr>
                        @endforeach         
                    </tbody>
                </table>            

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

              </div>

            </div>
          </div>
        </div>

<?php
    }
?>
        

    </div>
</div>