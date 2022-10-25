<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserEmail implements FromCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function collection()
    {

        $items = User::where('status', 3)->select('email')->distinct()->get();
        $emails = [];

        foreach ($items as $item) {
            array_push($emails, array($item->email));
        }


        return collect($emails);

    }
}
