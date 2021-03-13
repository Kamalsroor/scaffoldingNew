<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class Export implements FromCollection , WithHeadings , ShouldAutoSize  , WithEvents
{
    use Exportable;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;


    }


    public function headings(): array
    {
        return array_keys($this->data->jsonSerialize()[0]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }


    /**
     * @return array
     */
    public function registerEvents(): array
    {
            return [
                AfterSheet::class => function(AfterSheet $event) {
                    $alphas = range('A', 'Z');
                    $headerCount = $alphas[count(array_keys($this->data->jsonSerialize()[0])) - 1 ];
                    $count = count($this->data->jsonSerialize()) + 1;
                    $reange = "A1:".$headerCount.$count;
                    $event->sheet->setFontSize($reange,16);
                    $event->sheet->horizontalAlign($reange , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->verticalAlign($reange , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $event->sheet->setFontFamily($reange, 'Times New Roman');

                    for ($i=0; $i < count(array_keys($this->data->jsonSerialize()[0])) ; $i++) {
                        for ($x=1; $x <=  $count; $x++) {

                            if($x == 1 ){
                                $event->sheet->styleCells(
                                    $alphas[$i].$x,[
                                        'font' => [
                                            'name'      =>  'Calibri',
                                            'size'      =>  22,
                                            'bold'      =>  true,
                                            'color' => ['argb' => 'EEEEEE'],
                                        ],

                                        'fill' => [
                                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                            'color' => ['argb' => "000000"]
                                        ],
                                        'borders' =>[
                                            'top' =>[
                                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM
                                            ],
                                            'bottom' =>[
                                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM
                                            ],
                                            'left' =>[
                                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM
                                            ],
                                            'right' =>[
                                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM
                                            ]
                                        ]
                                    ]
                                );
                            }else{

                                $event->sheet->styleCells(
                                    $alphas[$i].$x,[
                                        'borders' =>[
                                            'top' =>[
                                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                                            ],
                                            'bottom' =>[
                                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                                            ],
                                            'left' =>[
                                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                                            ],
                                            'right' =>[
                                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                                            ]
                                        ]
                                    ]
                                );
                            }
                        }
                    }

                    $event->sheet->getStyle($reange)->applyFromArray([
                        'font' => [
                            'bold' => true
                        ]
                    ]);
                },
            ];
    }


    public function afterSheet(AfterSheet $event)
    {

        // $event->sheet->wrapText('A1:AC100');
        // $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // $event->sheet->setFontFamily('A1:AC100', 'Times New Roman');
        // $event->sheet->horizontalAlign('D1:Q2' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $event->sheet->horizontalAlign('E6:X6' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $event->sheet->verticalAlign('A1:AC100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        // $event->sheet->verticalAlign('A8:D100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        // $event->sheet->horizontalAlign('A6:X7', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $event->sheet->horizontalAlign('E8:AC100', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $event->sheet->verticalAlign('E7:X7' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_BOTTOM);
        // $event->sheet->verticalAlign('A8:D100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        // $event->sheet->textRotation('E7:X7', 90);

    }

}
