<?php

namespace App\Exports;

use App\Models\Contract;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContractExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contract::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Рег. №',
            'Дата рег.',
            'Тип договора',
            'Номер договора',
            'Дата договора',
            'Контрагент',
            'Категория',
            'Предмет',
            'Статья',
            'Сумма',
            'Срок договора',
            'Статус',
            'Дата создание',
            'Дата редактирование',
            'Дата удаление'
        ];
    }
}
