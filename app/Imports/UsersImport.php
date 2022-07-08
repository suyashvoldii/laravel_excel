<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class UsersImport implements ToModel, WithHeadingRow,SkipsOnError,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'=> $row['name'],
            'email'=> $row['email'],
            'password'=>Hash::make('password')
        ]);
    }

    public function onError(Throwable $error)
    {}

    public function rules(): array{
        return [
            '*.email' => ['email','unique:users,email']
        ];
    }
}
