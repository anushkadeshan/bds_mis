<?php

namespace App\Exports;

use App\SentSMS;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class SentSMSExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    function __construct($query) {
        $this->query = $query;
    }
    public function query()
    {
        return $this->query;
    }
}
