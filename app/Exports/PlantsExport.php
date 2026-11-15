<?php

namespace App\Exports;

use Illuminate\Support\Collection;

class PlantsExport
{
    protected Collection $plants;

    public function __construct(Collection $plants)
    {
        $this->plants = $plants;
    }

    public function collection()
    {
        return $this->plants->map(function ($plant) {
            return [
                'Plant ID' => $plant->id,
                'Plant Name' => $plant->plant_name,
                'Category' => $plant->category,
                'Unit Price' => $plant->unit_price,
                'Description' => $plant->description,
                'Stock Status' => $plant->stock_status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Plant ID',
            'Plant Name',
            'Category',
            'Unit Price',
            'Description',
            'Stock Status',
        ];
    }
}
