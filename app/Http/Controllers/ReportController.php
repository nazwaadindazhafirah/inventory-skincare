<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * ==============================
     * HALAMAN LAPORAN (WEB)
     * ==============================
     */
    public function stock()
    {
        // Hanya admin yang boleh mengakses
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $products = Product::all();

        return view('reports.stock', [
            'products' => $products,
            'aman'     => $products->where('stock', '>', 5)->count(),
            'hampir'   => $products->where('stock', '<=', 5)->where('stock', '>', 0)->count(),
            'habis'    => $products->where('stock', 0)->count(),
            'logo'     => asset('logo.jpeg'),  // Logo untuk halaman web
        ]);
    }

    /**
     * ==============================
     * EXPORT PDF LAPORAN
     * ==============================
     */
    public function exportPDF()
    {
        // Hanya admin yang boleh mengakses
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $products = Product::all();

        $pdf = Pdf::loadView('reports.pdf', [
            'products' => $products,
            'logo'     => public_path('logo.jpeg'), // Path lokal wajib untuk PDF
        ]);

        return $pdf->stream('laporan-stok.pdf');
    }
}
