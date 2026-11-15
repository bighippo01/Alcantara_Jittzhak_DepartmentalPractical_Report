
@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold">Plant Inventory</h3>
        <p class="text-muted">Manage your nursery plants.</p>
    </div>

    <a href="{{ route('plants.create') }}"
       class="btn btn-success">
        + Add Plant
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Plant Name</th>
                        <th>Category</th>
                        <th>Unit Price</th>
                        <th>Stock Status</th>
                        <th>Actions</th>
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
                                <span class="badge bg-success">
                                    In Stock
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    Out of Stock
                                </span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('plants.show', $plant->id) }}"
                               class="btn btn-info btn-sm text-white">
                                View
                            </a>

                            <a href="{{ route('plants.edit', $plant->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('plants.destroy', $plant->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this plant?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No plant records found.
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

        {{ $plants->links('pagination::bootstrap-5') }}

    </div>
</div>

@endsection
