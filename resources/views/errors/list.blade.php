@if ($errors->any())
    <div class="alert alert-danger alert" role="alertdialog">
        <ul>
            @foreach($errors->all() as $error)
                <li><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
