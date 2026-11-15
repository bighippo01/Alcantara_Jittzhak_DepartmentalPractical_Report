
@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h3 class="fw-bold">Plant Reports</h3>
    <p class="text-muted">
        View and export plant inventory records.
    </p>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <h5 class="mb-3">Filter Plant Records</h5>

        <form action="{{ route('reports.index') }}" method="GET">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label">Category</label>

                    <select name="category" class="form-select">
                        <option value="">All Categories</option>

                        @foreach(['ornamental', 'flowering', 'succulent', 'herb'] as $category)
                            <option value="{{ $category }}"
                                {{ request('category') == $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Stock Status</label>

                    <select name="stock_status" class="form-select">
                        <option value="">All Statuses</option>

                        <option value="in stock"
                            {{ request('stock_status') == 'in stock' ? 'selected' : '' }}>
                            In Stock
                        </option>

                        <option value="out of stock"
                            {{ request('stock_status') == 'out of stock' ? 'selected' : '' }}>
                            Out of Stock
                        </option>
                    </select>
                </div>

                <div class="col-md-4 d-flex align-items-end mb-3">
                    <button class="btn btn-success me-2">
                        Apply Filter
                    </button>

                    <a href="{{ route('reports.index') }}"
                       class="btn btn-secondary">
                        Reset
                    </a>
                </div>

            </div>
        </form>

    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5>Report Results ({{ $plants->count() }})</h5>

    <div>
        <a href="{{ route('reports.pdf', request()->query()) }}"
           class="btn btn-danger btn-sm">
            Export PDF
        </a>

        <a href="{{ route('reports.excel', request()->query()) }}"
           class="btn btn-success btn-sm">
            Export Excel
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover">

                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Plant Name</th>
                        <th>Category</th>
                        <th>Unit Price</th>
                        <th>Stock Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($plants as $plant)
                    <tr>
                        <td>{{ $plant->id }}</td>
                        <td>{{ $plant->plant_name }}</td>
                        <td>{{ ucfirst($plant->category) }}</td>
                        <td>₱{{ number_format($plant->unit_price, 2) }}</td>
                        <td>
                            @if($plant->stock_status == 'in stock')
                                <span class="badge bg-success">In Stock</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No matching plant records found.
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection
