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
                <a class="nav-link" aria-current="page" href="{{ route('employee.dashboard') }}">Menu</a>
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
    <h1 class="text-center">Edit Page</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="main p-3 container d-flex justify-content-between align-items-center" >
        <div style="max-width: 400px;" class="w-100">
            <h3>Edit Menu</h3>
            <form action="{{url('/employee/menu/editmenu')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$current->id}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$current->name}}" name="name" placeholder="Enter Menu Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label><br>
                    <select name="category" id="category" class="form-select" onchange="fetchCategory()">
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $current->id_category ? 'selected' : '' }}>{{ $item->name }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category</label><br>
                    <select name="subcategory" id="subcategory" class="form-select">
                        @foreach ($subcategory as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $current->id_subcategory ? 'selected' : '' }}>{{ $item->name }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter menu price" name="price" value="{{$current->price}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter menu description" name="desc" value="{{$current->description}}" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" >
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>

        <div style="max-width: 400px;" class="w-100">
            <h3 class="mt-5">Edit Recipe</h3>
            <form action="{{url('/employee/menu/editrecipe')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Menu</label><br>
                    <input type="text" name="menu" value="{{$current->name}}" class="form-control" id="menu" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Current Ingredient</label><br>
                    <select name="curringredient" id="" class="form-select">
                        @foreach ($curringredients as $item)
                            <option value="{{ $item->id }}">{{ $item->ingredients->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Edit Ingredient</label><br>
                    <select name="editingredient" id="newingredient" class="form-select" onchange="fetchUnit()">
                        @foreach ($ingredient as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <div class="form-group w-100">
                        <label for="exampleInputEmail1">Amount</label>
                        <input type="number" min="0" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" name="amount">
                    </div>
                    <div class="form-group ms-2">
                        <label for="exampleInputEmail1">Unit</label>
                        <input type="text" name="unit" value="g" class="form-control" id="unit" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
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

    function fetchUnit() {
        const ingredientId = document.getElementById('newingredient').value;
        const BASE_URL = "{{ url('/') }}";

        fetch(`${BASE_URL}/get-unit/${ingredientId}`)
            .then(response => response.json())
            .then(data => {
                const unitSelect = document.getElementById('unit');
                unitSelect.value = '';
                unitSelect.value = data.unit;
            })
            .catch(error => {
                console.error('Error fetching category:', error);
            });
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>