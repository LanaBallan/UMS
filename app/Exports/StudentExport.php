<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class StudentExport implements FromCollection, WithHeadings
{
    /**
     * @Illuminate\Http\Request mixed
     */
    private $info;
    public function __construct(Request $request)
    {
        $this->info=$request;

    }
    public function headings():array{
        return[

            'الحالة'
            ,'التخصص'
            ,'السنة'
            ,'اسم العائلة'
            ,'الاسم'
            ,'الرقم'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::getStudents($this->info);
    }
}
