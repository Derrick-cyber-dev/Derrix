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

        <h1 class="text-center mb-4">Bienvenue chez Derrix Contact</h1>

        <div class="mx-auto" style="max-width: 500px;">

            @if (session('success'))
                <div id="success-msg" class="alert alert-success">
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('success-msg').style.display = 'none';
                    }, 2000);
                </script>
            @endif


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="/">Derrix</a>

                    <div>

                        <a href="/admin/messages" class="btn btn-light">Messages</a>
                    </div>
                </div>
            </nav>
            <form method="POST" action="{{ route('messages.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="4" placeholder="Your message" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Envoyer</button>

            </form>

        </div>

    </div>

</body>

</html>
