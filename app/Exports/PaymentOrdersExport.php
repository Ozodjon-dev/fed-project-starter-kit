<?php

namespace App\Exports;

use App\Models\PaymentOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentOrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PaymentOrder::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Номер',
            'Дата',
            'Наименование плательщика',
            'Расчетный счет плательщика',
            'ИНН плательщика',
            'Наимен. банка плательщика',
            'Код банка плательщика',
            'СУММА',
            'Наименование получателя',
            'Расчетный счет получателя',
            'ИНН получателя',
            'Наимен. банка получателя',
            'Код банка получателя',
            'Сумма прописью',
            'Детали платежа',
            'Дебет',
            'Кредит',
            'Договор',
            'Статья',
            'Дата создание',
            'Дата редактирование',
            'Дата удаление'
        ];
    }
}
