@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Vaya! Al parecer existen algunos problemas:</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br>
@elseif(Session::has('warning'))
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>{{ Session::get('warning') }}
    </div>
    <br>
@elseif(Session::has('success'))
    <div class="alert alert-success" role="alert" id="prueba">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    <br>
@endif