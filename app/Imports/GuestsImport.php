<?php

namespace App\Imports;

use App\Guest;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class GuestsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guest([
            'guestList_id' => Auth::user()->project->list->id,
            'name' => $row[0],
            'lastName' => $row[1],
            'secondLastName' => $row[2],
            'email' => $row[7],
            'phone' => $row[6],
            'guests' => $row[4],
            'genere' => $row[3],
            'origin' => $row[5],
        ]);
    }
}
