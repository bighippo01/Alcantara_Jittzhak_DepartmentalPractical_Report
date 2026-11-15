<!DOCTYPE html>
<html>
<head>
    <title>Plant Inventory Report</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            color: #198754;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #cccccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #198754;
            color: white;
        }
    </style>
</head>

<body>

    <h2>Plant Nursery Inventory Report</h2>

    <p>Generated: {{ now()->format('F d, Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Plant Name</th>
                <th>Category</th>
                <th>Unit Price</th>
                <th>Stock Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($plants as $plant)
            <tr>
                <td>{{ $plant->id }}</td>
                <td>{{ $plant->plant_name }}</td>
                <td>{{ $plant->category }}</td>
                <td>₱{{ number_format($plant->unit_price, 2) }}</td>
                <td>{{ ucfirst($plant->stock_status) }}</td>
            </tr>
            @endforeach

            @if($plants->isEmpty())
                <tr>
                    <td colspan="5">No records found.</td>
                </tr>
            @endif
        </tbody>
    </table>

</body>
</html>
