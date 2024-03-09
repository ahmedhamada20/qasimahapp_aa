<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::where('show',1)->select([
            'id',
            'title->ar'
        ])->orderBy('id', 'DESC')->get();
    }
}
