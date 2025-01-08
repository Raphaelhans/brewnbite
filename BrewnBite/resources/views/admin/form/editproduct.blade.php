@extends('admin.layout')

@section('title')
    Edit Product
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card card-warning" style="width: 100%; max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <form action="{{ route('admin.master.products.doedit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" id="inputname" placeholder="Enter name" name="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        @foreach ($categories as $item)
                            @if ($item->id == $product->category->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else                            
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subcategory">Sub-subcategory</label>
                    <select class="form-control" id="subcategory" name="subcategory" required>
                        @foreach ($subcategories as $item)
                            @if ($item->id == $product->subcategory->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputprice">Price</label>
                    <input type="number" class="form-control" id="inputprice" placeholder="Enter price" name="price" value="{{ $product->price }}" required>
                </div>
                <div class="form-group">
                    <label for="inputrating">Rating</label>
                    <input type="number" class="form-control" id="inputrating" placeholder="Enter rating" name="rating" value="{{ $product->rating }}" required>
                </div>
                <div class="form-group">
                    <label for="inputdesc">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Description" id="inputdesc" name="description">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="weather">Weather</label>
                    <select class="form-control" id="weather" name="weather" required>
                        @if ($product->weather == 'Clear')
                            <option value="Clear" selected>Clear</option>
                            <option value="Clouds">Clouds</option>
                            <option value="Rain">Rain</option>
                            <option value="Drizzle">Drizzle</option>
                            <option value="Thunderstorm">Thunderstorm</option>
                        @else
                            @if ($product->weather == 'Clouds')
                                <option value="Clouds" selected>Clouds</option>
                                <option value="Clear">Clear</option>
                                <option value="Rain">Rain</option>
                                <option value="Drizzle">Drizzle</option>
                                <option value="Thunderstorm">Thunderstorm</option>
                            @else
                                @if ($product->weather == 'Rain')
                                    <option value="Rain" selected>Rain</option>
                                    <option value="Clear">Clear</option>
                                    <option value="Clouds">Clouds</option>
                                    <option value="Drizzle">Drizzle</option>
                                    <option value="Thunderstorm">Thunderstorm</option>
                                @else
                                    @if ($product->weather == 'Drizzle')
                                        <option value="Drizzle" selected>Drizzle</option>
                                        <option value="Clear">Clear</option>
                                        <option value="Clouds">Clouds</option>
                                        <option value="Rain">Rain</option>
                                        <option value="Thunderstorm">Thunderstorm</option>
                                    @else
                                        <option value="Thunderstorm" selected>Thunderstorm</option>
                                        <option value="Clear">Clear</option>
                                        <option value="Clouds">Clouds</option>
                                        <option value="Rain">Rain</option>
                                        <option value="Drizzle">Drizzle</option>
                                    @endif
                                @endif
                            @endif
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputimage">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputimage" name="image">
                        <label class="custom-file-label" for="inputimage">Choose file</label>
                      </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.master.products.products') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" style="margin-left: 75%">Submit</button>
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