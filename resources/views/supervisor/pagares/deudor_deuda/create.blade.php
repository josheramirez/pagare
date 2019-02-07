@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
    {!! Form::open(['route'=> 'supervisor.pagare.deudor-deuda.store', 'method' => 'POST']) !!}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary mb-1">
                <div class="card-header">Información del deudor</div>

                <div class="card-body">
                    @include('digitador.pagares.deudor_deuda.partials.field_deudor')
                </div>
            </div>
        </div>
    </div>
    {{--
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-info mb-1">
                <div class="card-header">Información financiera</div>

                <div class="card-body">
                    @include('digitador.pagares.deudor_deuda.partials.field_deuda')
                </div>
            </div>
        </div>
    </div>
    --}}
    <br>
    <div class="row text-right">
        <div class="col-md-12">
            {!! link_to(route('supervisor.index'),'Volver', ['class' => 'btn btn-outline-secondary']) !!}
            {!! Form::submit('Guardar y continuar', ['class' => 'btn btn-primary', 'id' => 'register', 'onclick' => 'submitForm(this)']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
<br>
@endsection

@section('scripts')
    <script>
        function submitForm(btn) {
            // disable the button
            btn.disabled = true;
            // submit the form
            btn.form.submit();
        }
    </script>
    {{--
        <script>
        function divideBy()
        {
            num1 = document.getElementById("total").value;
            num2 = document.getElementById("n_cuota").value;
            result = Math.round(num1 / num2);
            $('#valor_cuota').val(result);
        }
    </script>
    --}}

    <script>

        function funcion_ajax() {

            var rut=$("#rut").val();
            


            if(rut.length > 7 && rut.length<10){

                //peticion de url desde html
                    //window.location.href = "{{route('supervisor.buscar.peticion')}}";
            

            var route='{{route('supervisor.buscar.peticion')}}';

            $.ajax({

                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: route,
                type: 'POST',
                dataType: 'json',
                data:{dato:rut},
                success: function(data) {

                    //Obtengo cantidad de llaves del json
                        // var count = Object.keys(data).length;
                        // alert(count);

                    //Obtengo el largo del arragy de datos del usuario
                            
// FUNCION PARA SABER LA CANTIDAD DE RESPUESTAS QUE VIENEN EN EL ARRAY PAGARES_RUT
    // var datos_largo=data["pagares_rut"].length;

    // if(datos_largo>0){
    //     // para imprimir por consola
    //     //console.log(datos_largo);
    //     if(datos_largo>1){
    //         alert("Este Rut tiene "+datos_largo+" deudas pendientes");
    //     }else{
    //         alert("Este Rut tiene una deuda pendiente");
    //     }
        
    // }
 /////////////////////////////////////////////                   
                    //return data; 
            
            if(data["pagares_rut"]>0){
                // para imprimir por consola
                //console.log(datos_largo);
                if(data["pagares_rut"]>1){
                    alert("Este Rut tiene "+data["pagares_rut"]+" deudas pendientes");
                }else{
                    alert("Este Rut tiene una deuda pendiente");
                }
                
            }

                }
            })

            }



        }
    </script>
@endsection