<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserImportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserImportController extends Controller
{
    protected $service;

    public function __construct(UserImportService $service)
    {
        $this->service = $service;
    }

    // Affiche la page d'import
    public function index()
    {
        $auth = Auth::user();

        if ($auth->role != 'admin') {
            abort(403);
        }

        return view('admin.import');
    }

    // Traite le fichier Excel
    public function store(Request $request)
    {
        $request->user()->role != 'admin' ? abort(403) : null;

        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        $imported = $this->service->importFromFile($request->file('file'));

        return back()->with('success', "Utilisateur(s) importé(s) avec succès !");
    }
}
