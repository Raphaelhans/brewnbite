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
                <a class="nav-link active" href="#">Inventory</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="main p-3">
        <div>
            <h1 class="text-center">Inventory</h1>
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
            <h3 id="subheader">Add Inventory</h1>
            <div style="max-width: 400px;">
                <form action="ingredient/insert" method="post" id="ingredientForm">
                    @csrf
                    <input type="hidden" name="idingredient" id="idingredient">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Menu Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stock</label>
                        <input type="number" min="0" class="form-control" id="stock" placeholder="Enter menu price" name="stock" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Unit</label>
                        <select name="unit" id="unit" class="form-select">
                            <option value="g">g</option>  
                            <option value="ml">ml</option>  
                            <option value="pcs">pcs</option>  
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                </form>
            </div>
        </div>
        <br>
        <table id="menuTable" class="table table-striped " style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-start">Stock</th>
                    <th>Unit</th>
                    <th class="text-start">Created at</th>
                    <th class="text-start">Updated at</th>
                    <th>Deleted at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredient as $item)
                    <tr>
                        <td class="text-start">{{ $item->name }}</td>
                        <td class="text-start">{{ $item->stock }}</td>
                        <td class="text-start">{{ $item->unit }}</td>
                        <td class="text-start">{{ $item->created_at }}</td>
                        <td class="text-start">{{ $item->updated_at }}</td>
                        <td class="text-start">{{ $item->deleted_at }}</td>
                        <td class="align-middle">
                            <div class="d-flex">
                                <button 
                                    class="btn btn-primary me-2 edit-button" 
                                    data-id="{{ $item->id }}" 
                                    data-name="{{ $item->name }}" 
                                    data-stock="{{ $item->stock }}" 
                                    data-unit="{{ $item->unit }}"
                                >
                                    Edit
                                </button>
                                <form action="ingredient/delete" method="post">
                                    @csrf
                                    <input type="text" name="id" value="{{ $item->id }}" hidden>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>                   
                @endforeach
            </tbody>
        </table>
    </div>

<script>
    $(document).ready(function () {
        $('#menuTable').DataTable(); 
    });

    document.addEventListener('DOMContentLoaded', () => {
        const editButtons = document.querySelectorAll('.edit-button');
        const form = document.getElementById('ingredientForm');
        const nameInput = document.getElementById('name');
        const stockInput = document.getElementById('stock');
        const unitSelect = document.getElementById('unit');
        const idIngredient = document.getElementById('idingredient');
        const subheader = document.getElementById('subheader');
        const submitButton = document.getElementById('submitButton');

        editButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const stock = button.getAttribute('data-stock');
                const unit = button.getAttribute('data-unit');

                nameInput.value = name;
                stockInput.value = stock;
                unitSelect.value = unit;
                idIngredient.value = id;

                form.action = `ingredient/update`;

                submitButton.textContent = 'Update';
                subheader.textContent = 'Edit Inventory';
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>