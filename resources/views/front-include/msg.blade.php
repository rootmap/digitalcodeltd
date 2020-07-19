

@if (session('status'))
    <div class="alert alert-success" id="create_account_error">{{ session('status') }}</div>
@endif

@if (count($errors) > 0)

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" id="create_account_error">{{ $error }}</div>
            @endforeach

@endif
