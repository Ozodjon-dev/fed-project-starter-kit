<?php

namespace App\Exports;

use App\Models\PaymentOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class PaymentOrdersExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $search = $this->request->input('search'); // Qidiruv so‘zi
        $applicants = $this->request->input('applicant', []); // Checkbox orqali tanlangan tashkilotlar

        // Filtrlangan ma'lumotlarni olish
        return PaymentOrder::when($search, function ($query, $search) {
            return $query->where('number', 'like', "%{$search}%")
                ->orWhere('date', 'like', "%{$search}%")
                ->orWhere('applicant', 'like', "%{$search}%")
                ->orWhere('contractor', 'like', "%{$search}%")
                ->orWhere('beneficiary_tin', 'like', "%{$search}%")
                ->orWhere('beneficiary_bank_account', 'like', "%{$search}%")
                ->orWhere('amount', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('article', 'like', "%{$search}%");
        })
            ->when(!empty($applicants), function ($query) use ($applicants) {
                return $query->whereIn('applicant', $applicants);
            })
            ->orderBy('date', 'desc')
            ->get();
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
