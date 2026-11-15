
@extends('layouts.app')

@section('content')

<div class="card shadow-sm mx-auto" style="max-width: 700px;">

    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Add New Plant</h5>
    </div>

    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('plants.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Plant Name</label>
                <input type="text" name="plant_name"
                       class="form-control"
                       value="{{ old('plant_name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select" required>
                    <option value="">Select Category</option>
                    @foreach(['ornamental', 'flowering', 'succulent', 'herb'] as $category)
                        <option value="{{ $category }}"
                            {{ old('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Unit Price (₱)</label>
                <input type="number" name="unit_price"
                       class="form-control"
                       step="0.01" min="0" max="9999999999.99"
                       value="{{ old('unit_price') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description"
                          class="form-control"
                          rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Stock Status</label>
                <select name="stock_status" class="form-select" required>
                    <option value="in stock">In Stock</option>
                    <option value="out of stock">Out of Stock</option>
                </select>
            </div>

            <button class="btn btn-success">Save Plant</button>

            <a href="{{ route('plants.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</div>

@endsection
