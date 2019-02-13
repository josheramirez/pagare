<div class="form-row">
  
{{--no corre el script si se pone en otro lado--}}
    <script>

        function divideBy(elemento)
        {
            num1 = document.getElementById("total").value;
            num2 = document.getElementById("n_cuota").value;
        

            if (elemento.value == '') {
               if(elemento.id=="total"){
                    elemento.setCustomValidity("Debe ingresar un monto para la Deuda");
               }
               if(elemento.id=="n_cuota"){
                    elemento.setCustomValidity("Debe indicar la cantidad de cuotas");
               }
                
            }
            else {
                elemento.setCustomValidity('');
            }
        
            result = Math.round(num1 / num2);
            $('#valor_cuota').val(result);

        return true;       
        }

        function formato(){
             num1 = document.getElementById("total").value;

             <?php  ?>
             num1=number_format(num1 , 0, ',', '.');
                $('#total').val(num1);
             console.log(document.getElementById("total").value);
             alert("hola");
        }



    </script>

{{--FECHA VENCIMIENTO cuando es null sera usado como fecha de 1° cuota --}}

<?php
//SI NO ESTAN ASIGNADAS LAS CUOTAS
    if($deuda->vencimiento!=null){
?>
            <div class="form-group col-md-3">
                {!! Form::label('vencimiento', 'Fecha Vencimiento Cuotas') !!}
                {!! Form::date('vencimiento', null, ['class' => 'form-control','readonly']) !!}
                {!! Form::hidden('cuotas','creadas') !!}
            </div>

            <div class="form-group col-md-3">
                {!! Form::label('total', 'Deuda inicial') !!}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    
                    {{-- Form::number('total', null, ['class' => 'form-control']) --}}
                    {!! Form::number('total', null, ['class' => 'form-control', 'onInput' => 'divideBy(this)','oninvalid'=>'divideBy(this)','required','readonly']) !!}

                </div>
            </div>

            <div class="form-group col-md-3">
                {!! Form::label('n_cuota', 'Número de cuotas') !!}
                {!! Form::number('n_cuota', null, ['class' => 'form-control', 'onInput' => 'divideBy(this)','oninvalid'=>'divideBy(this)','required','readonly']) !!}
                
                {{-- Form::number('n_cuota', null, ['class' => 'form-control', 'onblur' => 'divideBy()']) --}}

            </div>
            <div class="form-group col-md-3">
                {!! Form::label('valor_cuota', 'Valor cuota') !!}
                                                                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    {!! Form::number('valor_cuota', null, ['class' => 'form-control','readonly']) !!}
                </div>
            </div>


<?php }
//SI ESTAN ASIGNADAS LAS CUOTAS
else{ ?>

            <div class="form-group col-md-3">
                {!! Form::label('vencimiento', 'Fecha Pago 1° Cuota') !!}
                {!! Form::date('vencimiento', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                {!! Form::hidden('cuotas','sin_crear') !!}
            </div>

            <div class="form-group col-md-3">
            {!! Form::label('total', 'Deuda inicial') !!}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    {{-- Form::number('total', null, ['class' => 'form-control']) --}}
                    {!! Form::number('total', null, ['class' => 'form-control', 'onInput' => 'divideBy(this)','oninvalid'=>'divideBy(this)','required']) !!}
                </div>
            </div>

            <div class="form-group col-md-3">
                {!! Form::label('n_cuota', 'Número de cuotas') !!}
                {!! Form::number('n_cuota', null, ['class' => 'form-control', 'onInput' => 'divideBy(this)','oninvalid'=>'divideBy(this)','required']) !!}
                
                {{-- Form::number('n_cuota', null, ['class' => 'form-control', 'onblur' => 'divideBy()']) --}}

            </div>
            <div class="form-group col-md-3">
                {!! Form::label('valor_cuota', 'Valor cuota') !!}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    {!! Form::number('valor_cuota', null, ['class' => 'form-control']) !!}
                </div>
            </div>

<?php } ?>

  

    
</div>


{!! Form::hidden('pagare', $deuda->pagare->id) !!}
{!! Form::hidden('deuda_id', $deuda->id) !!}

