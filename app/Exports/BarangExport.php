<?php

namespace App\Exports;

use App\Barang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExport implements FromCollection, WithHeadings
{
    protected $request;

    /**
     * Terima parameter filter dari controller
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Data yang akan diexport ke Excel
     */
    public function collection()
    {
        $query = Barang::query();

        // Filter tanggal
        if ($this->request->tanggal_awal && $this->request->tanggal_akhir) {
            $query->whereBetween('created_at', [
                $this->request->tanggal_awal,
                $this->request->tanggal_akhir
            ]);
        }

        // Filter supplier
        if ($this->request->supplier) {
            $query->where('supplier', $this->request->supplier);
        }

        // Filter stok
        if ($this->request->stok == 'habis') {
            $query->where('stok', 0);
        }

        if ($this->request->stok == 'tersedia') {
            $query->where('stok', '>', 0);
        }

        return $query->select(
            'namabarang',
            'stok',
            'harga',
            'supplier',
            'created_at'
        )->get();
    }

    /**
     * Header kolom Excel
     */
    public function headings(): array
    {
        return [
            'Nama Barang',
            'Stok',
            'Harga',
            'Supplier',
            'Tanggal Input'
        ];
    }
}
