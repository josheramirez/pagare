@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('partials/message')
        </div>
    </div>
   {{--{!! Form::model($deuda, ['route'=> ['supervisor.pagare.deuda.update', $deuda], 'method' => 'PUT']) !!}--}} 
 {!! Form::model($deuda, array('route' => ['prueba'],'method'=>'GET'))  !!}

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary mb-1">
                <div class="card-header">Deuda</div>

                <div class="card-body">
                    @include('supervisor.pagares.deudor_deuda.partials.field_edit_deuda')
                </div>
            </div>
        </div>
    </div>
    <div class="row text-right">
        <div class="col-md-12">
            {!! link_to(route('supervisor.pagare.view', [$deuda->pagare->id]),'Volver', ['class' => 'btn btn-light']) !!}
            {!! Form::submit('Guardar y continuar', ['class' => 'btn btn-primary','id'=>'btn_deuda']) !!}
            
            {{--$deuda->vencimiento--}}
            
            

            <?php  
                if($deuda->vencimiento!=null){
            ?>
            <script>
                var x = document.getElementById("btn_deuda");
                x.style.display = "none";   
            </script>

            <?php 
                }else{
            ?>
            
        <script>
                var x = document.getElementById("btn_deuda");
                x.style.display = "inline-block";   
            </script>

            <?php } ?>
            



        </div>
    </div>
    {!! Form::close() !!}
</div>
<br>
@endsection

@section('scripts')
    {{--<script>
        function divideBy()
        {
            num1 = document.getElementById("total").value;
            num2 = document.getElementById("n_cuota").value;
            result = Math.round(num1 / num2);
            $('#valor_cuota').val(result);
        }
    </script>
    --}}
@endsection