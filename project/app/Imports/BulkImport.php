<?php
namespace App\Imports;
use App\Bulk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class BulkImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bulk([
            'user_id'=>auth()->user()->id,
            'source_id'     => $row['source_id'],
            'lead_name'    => $row['lead_name'],
            'lead_details'    => $row['lead_details'],
            'email'    => $row['email'],
            'phone_no'    => $row['phone_no'],
        ]);
    }
}