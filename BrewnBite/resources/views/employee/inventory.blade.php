<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/b9b5e10605.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
  
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="{{ asset('/Adminlte/dist/css/adminlte.min.css') }}">

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
                <a class="nav-link" aria-current="page" href="#">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('employee.listmenu') }}">List Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.history') }}">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('employee.inventory') }}">Inventory</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="main p-3">
        <div>
            <h1 class="text-center">Home</h1>
            <h3>Add or Update Inventory</h1>
            <div style="max-width: 400px;">
                <form action="/menu/insert" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Menu Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stock</label>
                        <input type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter menu price">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <br>
        <table id="menuTable" class="table table-striped " style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr> --}}
            </tbody>
        </table>
                
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
    </div>

<script>
    $(document).ready(function () {
        $('#menuTable').DataTable(); 
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>