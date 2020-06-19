<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportEmployees implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            //
            'emp_id' => @$row[0],
            'enrolment_id' => @$row[1],
            'emp_name' => @$row[2],
            'nid' => @$row[3]
        ]);
    }
}
