<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use PDF;

class InvoiceController extends Controller
{
    public function exportPDF($id)
    {
        $invoiceBill = Bill::find($id);
        $myCourse = $invoiceBill->myCourse ?? null;
        $tenKhoaHoc = $myCourse ? $myCourse->tenKhoaHoc : 'N/A';
        $giaCa = $myCourse ? $myCourse->giaCa : 'N/A';

        $invoice = [
            'invoice' => $invoiceBill,
            'tenKhoaHoc' => $tenKhoaHoc,
            'giaCa' => $giaCa,
        ];

        $data = ['invoice' => $invoice];
        $pdf = PDF::loadView('Invoices.invoice', $data);

        return $pdf->download('hoaDon-' . $invoiceBill->maHoaDon . '.pdf');
    }
}
