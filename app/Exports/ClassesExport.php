<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClassesExport implements FromCollection, WithHeadings
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
            'الفئة'
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
        if($this->info->classification=='avg')
        {
            $students= Student::getClassesByAvg($this->info);
        }
        else
        {
            $students= Student::getClassesByName($this->info);
        }
        $total=count($students);
        $numOfStudentsInClass=$total/$this->info->classes;
        $i=0;
        $class=1;
        foreach ($students as $one)
        {
            if($i==$numOfStudentsInClass)
            {
                $class++;
                $i=0;
            }
            $one->class=$class;

            $i++;
        }
        return $students;

    }
}
