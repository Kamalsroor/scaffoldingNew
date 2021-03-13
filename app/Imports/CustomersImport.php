<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class CustomersImport implements ToModel,WithValidation,WithHeadingRow
{

    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }
        return new User([
            'name'     => $row['name'],
            'email'     => $row['email'],
            'phone'     => $row['phone'],
            'type'     => \App\Models\User::CUSTOMER_TYPE,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }

    public function rules(): array
    {

        return [
            //     'data.*.name' => 'required|string|max:255',
            //     'data.*.email' => 'required|email|unique:users,email',
            //     'data.*.phone' => 'required|unique:users,phone',
        ];
    }

}




