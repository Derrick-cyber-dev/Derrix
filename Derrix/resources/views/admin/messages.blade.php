<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Derrix</title>
</head>

<body>
    <div class="container mt-5">

        <h1 class="mb-4">Derrix Messages</h1>

        @foreach ($messages as $msg)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">

                    <h5 class="card-title">
                        {{ $msg->name }}
                        <small class="text-muted">({{ $msg->email }})</small>
                    </h5>

                    <p class="card-text">{{ $msg->message }}</p>

                    <span class="badge bg-{{ $msg->status == 'read' ? 'success' : 'warning' }}">
                        {{ $msg->status }}
                    </span>

                    <div class="mt-3 d-flex gap-2">

                        @if ($msg->status == 'unread')
                            <form method="POST" action="/admin/messages/{{ $msg->id }}/read">
                                @csrf
                                <button class="btn btn-sm btn-primary">Mark as Read</button>
                            </form>
                        @endif

                        <form method="POST" action="/admin/messages/{{ $msg->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>

                    </div>

                </div>
            </div>
        @endforeach

         <a href="/" class="btn btn-secondary mb-3">← Retour</a>
    </div>



</body>

</html>
