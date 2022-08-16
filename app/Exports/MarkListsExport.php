<?php

namespace App\Exports;

use App\Models\Mark;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MarkListsExport implements FromCollection, WithHeadings
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
            'الرقم الجامعي'
            ,'الاسم'
            ,'اسم العائلة'
            ,'علامة العملي'
            ,'علامة النظري'
            ,'العلامة الكاملة'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mark::getMarks($this->info);
    }
}
