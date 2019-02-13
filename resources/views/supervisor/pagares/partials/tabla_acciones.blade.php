
<br>
<div class="card">
    <div class="card-header">
        Acciones
    </div>

<!-- VALIDAR PAGARE-->
    <div class="card-body">
        @if( $pagare->estado_id == 1 && $pagare->numeracion == null)
            <h5 class="card-title">Validar Pagare</h5>
            <p class="card-text">
                {!! Form::model($pagare, ['route'=> ['supervisor.pagare.estado.update', $pagare], 'method' => 'PUT', 'id' => 'from1']) !!}
                {!! Form::hidden('estado_id', null) !!}
                Si el pagare no necesita más modificaciones presione el siguiente boton.
                {!! Form::submit('Validar Pagare', ['class' => 'btn btn-info', 'id' =>'btn-submit']) !!}
                {!! Form::close() !!}
            </p>
            <hr>
        @endif

        <!-- MODIFICO OBJETO $PAGARE AGREGANDOLE CAMPO MENSAJE, QUE CORREPONDE AL MOTIVO DE ANULACION -->
        
        <!-- COMO AGREGAR CODIGO EN BLADE
        @php
            $mensaje="vacio";
        @endphp
        -->


<!-- ANULAR PAGARE-->
        <?php
            $mensaje="";
        ?>

        @if($pagare->estado_id == 1 || $pagare->estado_id == 2)
            <h5 class="card-title">Anular Pagare</h5>
            <p class="card-text">

            <!-- CODIGO NUEVO-->
            <div id="seccion_boton_anular5">
                Si requiere anular el pagare presiones el siguiente boton
                <button id="boton_anular" type="button" class="btn btn-danger" onclick="seccion_anular_block()" >Anular Pagare</button> 
            </div>

            <div id="seccion_boton_anular2" style="display: none">
                Si requiere anular el pagare presiones el siguiente boton
                <button id="boton_anular" type="button" class="btn btn-alert" onclick="seccion_anular2()" >Anular Pagare</button> 
            </div>

            <div id="seccion" style="display: none">
                Si requiere anular el pagare presiones el siguiente boton
                <div >
                <input type="text" class="form-control">
                <input type="button" class="btn btn-alert" value="Abortar">
                <input type="button" class="btn btn-success" value="Anular">
                </div>


            </div>

            <div id="seccion_boton_anular" style="display: none">
            <!-- V3 -->
                    {!! Form::model($pagare, ['route'=> ['supervisor.pagare.estado.anular', $pagare], 'method' => 'PUT', 'id' => 'from2']) !!}
                         Debe ingresar un motivo para poder anular este pagare
                        <div class="form-group row">
                          <div class="col-6">
                            <input type="text" name="motivo" value="" class="form-control" required placeholder="tienes un maximo de 300 caracteres" maxlength="300">
                            <input type="hidden" name="motivo_autor" value="<?=Auth::user()->full_nombre?>" class="form-control" required>
                          </div>
                          <div class="col-1">
                            <button class="btn btn-primary" style="border-radius: 0.25rem" type="button" onclick="seccion_anular_none()">Abortar</button>
                          </div>
                             <div class="col-1">
                                {!! Form::submit('Anular', ['class' => 'btn btn-success', 'id' =>'btn-submit2']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
            <!-- V2
            Debe ingresar un motivo para poder anular este pagare
                
              <input type="text" class="form-control" placeholder="" aria-label=""  aria-describedby="basic-addon1" onchange="modificar_motivo(this.value)">
              <div>
                        {!! Form::model($pagare, ['route'=> ['supervisor.pagare.estado.anular', $pagare], 'method' => 'PUT', 'id' => 'from2']) !!}
                        {{ Form::text('motivo', null, ['class' => 'form-control', 'style'=>'']) }}
                         <button class="btn btn-primary" style="border-radius: 0.25rem" type="button" onclick="seccion_anular_none()">Abortar</button>
                        {{ Form::hidden('invisible', $mensaje) }}
                        {!! Form::submit('Anular', ['class' => 'btn btn-success', 'id' =>'btn-submit2']) !!}
                        {!! Form::close() !!}
              </div>
            -->
            </div>


            <div>

            </div>                

            <script>
            function seccion_anular_none() {
                //alert("aprete");
                boton_ = document.getElementById("seccion_boton_anular");
                boton_.style.display = "none";
            }
            function seccion_anular_block() {
                //alert("aprete");
                boton_ = document.getElementById("seccion_boton_anular");
                boton_.style.display = "block";
            }
            function modificar_motivo(motivo){

            }
            </script>


                <!-- CODIGO ANTIGUO-->
                <!--
                {!! Form::model($pagare, ['route'=> ['supervisor.pagare.estado.anular', $pagare], 'method' => 'PUT', 'id' => 'from2']) !!}
                Si requiere anular el pagare presiones el siguiente boton
                {!! Form::submit('Anular Pagare', ['class' => 'btn btn-danger', 'id' =>'btn-submit2']) !!}
                {!! Form::close() !!}
                -->

            </p>
            <hr>
        @endif
<!-- IMPRIMIR PAGARE-->
        <h5 class="card-title">Imprimir Pagare</h5>
        <p class="card-text">
            Para imprimir o visualizar el pagare presione el siguiente boton
            <a href="{{ route('supervisor.pagare.print', [$pagare->id]) }}" class="btn btn-primary">Imprimir Pagare</a>
        </p>
        <hr>
<!-- OBSERVACIONES-->
        <h5 class="card-title">Añadir Observacion</h5>
        <p class="card-text">
            Para crear observaciones adicionales a este pagare, presione el siguiente boton
            <a href="{{ route('supervisor.pagare.observacion', [$pagare->id]) }}" class="btn btn-primary" style="font-size: 13px">Añadir Observacion</a>

<!--             <a href="{{ route('supervisor.pagare.observacionMostrar', [$pagare->id]) }}" class="btn btn-primary">Mostrar Historico</a>
 -->
<?php  
if ($observaciones->count()<1){

}else{?>
        <br><br>
        Revise el historico de las observaciones realizadas a este pagare, presione el siguiente boton
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#yourModal{{$pagare->id}}" style="font-size: 13px; padding:6px; padding-left: 10px; padding-right: 10px;padding-bottom: -1px;" id="boton_lista{{$pagare->id}}">Mostrar Historico</button>


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

<?php }

?>
        </p>
        <hr>
<!-- MANDAR A JUDICIAL-->
        <div>
            <h5 class="card-title">Judicial</h5>
            <p class="card-text">
                {!! Form::model($pagare, ['route'=> ['supervisor.pagare.estado.judicial', $pagare], 'method' => 'PUT', 'id' => 'from3']) !!}
                     Para enviar el pagare a proceso judicial presione el siguiente boton   
                            {!! Form::submit('Enviar a judicial', ['class' => 'btn btn-primary', 'id' =>'btn-submit3']) !!} 
                {!! Form::close() !!}   
            </p>
        </div>

    </div>
</div>






