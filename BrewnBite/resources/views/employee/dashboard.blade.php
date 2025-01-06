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
                <a class="nav-link active" aria-current="page" href="#">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('employee.listmenu') }}">List Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.history') }}">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.inventory') }}">Inventory</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <h1 class="text-center">Menu</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    <div class="main p-3 container d-flex justify-content-between align-items-center" >
        <div style="max-width: 400px;" class="w-100">
            <h3>Add Menu</h3>
            <form action="menu/insert" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Menu Name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label><br>
                    <select name="category" id="category" class="form-select" onchange="fetchCategory()">
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category</label><br>
                    <select name="subcategory" id="subcategory" class="form-select">
                        @foreach ($subcategory as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter menu price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter menu price" name="desc" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div style="max-width: 400px;" class="w-100">
            <h3 class="mt-5">Add Recipe</h3>
            <form action="/menu/insertrecipe" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Menu</label><br>
                    <select name="menu" id="menu" class="form-select" >
                        @foreach ($menu as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ingredient</label><br>
                    <select name="ingredient" id="" class="form-select">
                        @foreach ($ingredient as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <div class="form-group w-100">
                        <label for="exampleInputEmail1">Stock</label>
                        <input type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter Stock" name="stock">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Unit</label>
                        <select name="unit" id="" class="form-select">
                            <option value="gr">gr</option>
                            <option value="ml">ml</option>
                            <option value="pcs">pcs</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
        <br>  
    </div>

<script>
    $(document).ready(function () {
        $('#menuTable').DataTable(); 
    });

    function fetchCategory() {
        const menuId = document.getElementById('category').value;
        const BASE_URL = "{{ url('/') }}";

        fetch(`${BASE_URL}/get-category/${menuId}`)
            .then(response => response.json())
            .then(data => {
                const subcategorySelect = document.getElementById('subcategory');
                subcategorySelect.innerHTML = '';
                data.forEach(subcategory => {
                    const option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    subcategorySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching category:', error);
            });
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>