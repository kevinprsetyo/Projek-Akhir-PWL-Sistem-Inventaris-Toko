<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use PDF;
use Excel;
use App\Exports\BarangExport;

class BarangExportController extends Controller
{
    /**
     * Ambil data barang berdasarkan filter
     */
    private function filterBarang(Request $request)
    {
        $query = Barang::query();

        // Filter tanggal input
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $query->whereBetween('created_at', [
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);
        }

        // Filter supplier
        if ($request->supplier) {
            $query->where('supplier', $request->supplier);
        }

        // Filter stok
        if ($request->stok == 'habis') {
            $query->where('stok', 0);
        }

        if ($request->stok == 'tersedia') {
            $query->where('stok', '>', 0);
        }

        return $query->orderBy('namabarang', 'asc')->get();
    }

    /**
     * Export PDF
     */
    public function exportPDF(Request $request)
    {
        $barang = $this->filterBarang($request);

        $pdf = PDF::loadView('export.barang_pdf', compact('barang'));

        return $pdf->download('laporan_barang.pdf');
    }

    /**
     * Export Excel
     */
    public function exportExcel(Request $request)
    {
        return Excel::download(
            new BarangExport($request),
            'laporan_barang.xlsx'
        );
    }
}
