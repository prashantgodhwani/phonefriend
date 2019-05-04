
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <i class="fa fa-exclamation-circle" aria-hidden="true" style="color: darkred; font-size: 1.3em"></i>&nbsp;&nbsp;
            @foreach ($errors->all() as $error)
                <span class="sr-only">Error:</span>
                <b> {{$error}}</b>
            @endforeach
        </ul>
    </div>
@endif