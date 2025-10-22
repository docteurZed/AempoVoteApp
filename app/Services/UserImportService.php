<?php

namespace App\Services;

use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class UserImportService
{
    /**
     * Importer les utilisateurs depuis un fichier Excel.
     */
    public function importFromFile($file)
    {
        $rows = Excel::toArray([], $file)[0];
        $headings = array_map('strtolower', $rows[0]);
        unset($rows[0]);

        $imported = 0;

        foreach ($rows as $row) {
            $data = array_combine($headings, $row);

            if (empty($data['email'])) continue;

            $name = trim(($data['nom'] ?? '') . ' ' . ($data['prenoms'] ?? ''));

            $level = isset($data['level']) ? strtolower(trim($data['level'])) : null;

            $filiere = isset($data['filiere']) ? strtolower(trim($data['filiere'])) : 'medecine';

            $phone = $data['phone'] ?? null;

            User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'        => $name,
                    'email'       => $data['email'],
                    'phone'       => $phone,
                    'filiere'     => $filiere,
                    'level'       => $level,
                    'is_active'   => true,
                    'role'        => 'member',
                ]
            );

            $imported++;
        }

        return $imported;
    }
}
