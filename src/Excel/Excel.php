<?php

namespace Gogol\Lebertest\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet as Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory as IOFactory;
class Excel
{
    protected string $name;
    protected string $surname;
    protected string $email;
    protected int $count;

    /**
     * Excel constructor.
     * @param $name
     * @param $surname
     * @param $email
     * @param $count
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function __construct($name, $surname, $email, $count){
        $this->name=$name;
        $this->surname=$surname;
        $this->email=$email;
        $this->count=$count;
        $spreadsheet = new Spreadsheet();

        //Insert cells
        for($i=1; $i<=$count; $i++){
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $this->name)
                ->setCellValue('B'.$i, $this->surname)
                ->setCellValue('C'.$i, $this->email);
        }

        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save($_SERVER['DOCUMENT_ROOT']."/files/docs/".rand(1, 9999).".xlsx");
    }


}