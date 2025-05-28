<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function form()
    {
        return view('surat.form');
    }

    public function generateFromForm(Request $request)
    {
        $tempat_tanggal = $request->input('tempat_tanggal');
        $kepada = $request->input('kepada');
        $judul = $request->input('judul');
        $isi = $request->input('isi');
        $ttd = $request->input('ttd');

        $html = view('surat.pdf-template', compact('tempat_tanggal', 'kepada', 'judul', 'isi', 'ttd'))->render();

        $pathToChromium = 'C:\Users\Rudy\.cache\puppeteer\chrome\win64-136.0.7103.94\chrome-win64\chrome.exe';

        $filename = 'surat-preview-' . time() . '.pdf';
        $savePath = storage_path("app/public/{$filename}");

        Browsershot::html($html)
            ->setChromePath($pathToChromium)
            ->setOption('args', ['--no-sandbox'])
            ->format('A4')
            ->save($savePath);

        return response()->download($savePath);
    }
}
