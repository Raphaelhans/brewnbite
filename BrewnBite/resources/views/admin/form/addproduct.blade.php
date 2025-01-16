@extends('admin.layout')

@section('title')
    Add Product
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-primary" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Add Product</h3>
        </div>
        <form action="{{ route('admin.master.products.doadd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subcategory">Sub-subcategory</label>
                    <select class="form-control" id="subcategory" name="subcategory" required>
                        @foreach ($subcategories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputprice">Price</label>
                    <input type="number" class="form-control" id="inputprice" placeholder="Enter price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="inputrating">Rating</label>
                    <input type="number" class="form-control" id="inputrating" placeholder="Enter rating" name="rating" required>
                </div>
                <div class="form-group">
                    <label for="inputdesc">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Description" id="inputdesc" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="weather">Weather</label>
                    <select class="form-control" id="weather" name="weather" required>
                        <option value="Clear">Clear</option>
                        <option value="Clouds">Clouds</option>
                        <option value="Rain">Rain</option>
                        <option value="Drizzle">Drizzle</option>
                        <option value="Thunderstorm">Thunderstorm</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputimage">Image</label>
                    <input type="text" class="form-control" id="inputimage" placeholder="Enter image link" name="image" required>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        document.getElementById('category').addEventListener('change', function () {
            const categoryId = this.value;
            const subcategoryDropdown = document.getElementById('subcategory');

            // Clear existing subcategories
            subcategoryDropdown.innerHTML = "";

            if (categoryId) {
                // Fetch subcategories via AJAX
                fetch(`/get-subcategories/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate subcategories
                        data.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subcategoryDropdown.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching subcategories:', error));
            }
        });
    </script>
@endsection