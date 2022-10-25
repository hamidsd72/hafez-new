<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserMobile implements FromCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function collection()
    {

        $items = User::where('status', 3)->select('mobile')->distinct()->get();
        $mobiles = [];

        foreach ($items as $item) {
            if (strlen($item->mobile) == 11) {
                array_push($mobiles, array($item->mobile));
            }
        }


        return collect($mobiles);

    }
}
