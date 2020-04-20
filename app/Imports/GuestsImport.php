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
            'email' => $row[3],
            'phone' => $row[4],
            'guests' => $row[5],
            'genere' => $row[6],
            'origin' => $row[7],
        ]);
    }
}
