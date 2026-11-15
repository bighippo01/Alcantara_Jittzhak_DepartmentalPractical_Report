
@extends('layouts.app')

@section('content')

<div class="card shadow-sm mx-auto" style="max-width: 700px;">

    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Plant Details</h5>
    </div>

    <div class="card-body">

        <h3 class="fw-bold">{{ $plant->plant_name }}</h3>

        <hr>

        <p><strong>Plant ID:</strong> {{ $plant->id }}</p>

        <p><strong>Category:</strong>
            {{ ucfirst($plant->category) }}
        </p>

        <p><strong>Unit Price:</strong>
            ₱{{ number_format($plant->unit_price, 2) }}
        </p>

        <p><strong>Description:</strong>
            {{ $plant->description ?? 'No description provided.' }}
        </p>

        <p><strong>Stock Status:</strong>
            {{ ucfirst($plant->stock_status) }}
        </p>

        <p><strong>Created:</strong>
            {{ $plant->created_at->format('M d, Y') }}
        </p>

        <a href="{{ route('plants.edit', $plant->id) }}"
           class="btn btn-warning">
            Edit
        </a>

        <a href="{{ route('plants.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>
</div>

@endsection
