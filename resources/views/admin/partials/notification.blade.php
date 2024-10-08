<div>
    @if (count($errors))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
    @if (Session::has('message') or isset($message))
        <div class="alert alert-{{ Session::get('message_type', $message_type ?? 'danger') }} alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Message &nbsp;</strong> {{ Session::get('message') ?? $message }}
        </div>
    @endif
</div>
