<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/b9b5e10605.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Employee</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/kar">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">History</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="main p-3">
        <div>
            <h1 class="text-center">History</h1>
            {{-- <h1>Add or Update Menu</h1> --}}
        </div>
        <br>
        <table class="table table-hover ">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Price</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
                
        {{-- @foreach ($employees as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['username'] }}</td>
                <td>{{ $item['password'] }}</td>
                {{-- <td>{{ $item['status'] }}</td> --}}
                {{-- <td>Active</td>
                <td>
                    <form action="/karyawan/update" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="username" value="{{ $item['username'] }}">
                        <input type="text" name="name" placeholder="New Name" class="form-control" required>
                        <input type="text" name="password" placeholder="New Password" class="form-control" required>
                        <button type="submit" class="btn btn-primary mt-1">Update</button>
                    </form>
                </td>
                <td>
                    <form action="/karyawan/delete" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="username" value="{{ $item['username'] }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr> --}}
        {{-- @endforeach  --}}
        </table>
    </div>

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>