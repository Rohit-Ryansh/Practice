<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class StudentImport implements ToModel, WithHeadingRow, WithUpserts, WithBatchInserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        $user = User::updateOrCreate(
            [
                'email'    => $row['email'],
            ],
            [
                'name'     => $row['name'],
                'expiry_date' => $row['expiry_date'],
                'password' => bcrypt('password'),
            ]
        );

        $user->assignRole('student');
        $permissions = $user->getPermissionsViaRoles();
        $user->givePermissionTo($permissions);

        return $user;
    }

    // Here we can set how many models will call 
    public function batchSize(): int
    {
        return 100;
    }

    // Here we can set how many records will import at one time
    public function chunkSize(): int
    {
        return 100;
    }


    public function uniqueBy()
    {
        return 'email';
    }
}
