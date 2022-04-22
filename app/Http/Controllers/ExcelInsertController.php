<?php

namespace App\Http\Controllers;

use App\Excel\ExcelImport;
use App\Models\Tariff;

class ExcelInsertController extends Controller
{
    private $excel;

    public function __construct(ExcelImport $excel)
    {
        $this->excel = $excel;
    }

    public function storeExcel()
    {
        $excelData = $this->excel->getExcelData();
        $fromWeights = [];
        $toWeights = [];
        $header = $excelData[0];
        $headerAsList = array_values($header);
        $fromWeights[0] = 0;
        $toWeights[0] = $headerAsList[1];
        $headerColumnCount = count($headerAsList);
        for ($i = 2; $i < $headerColumnCount; $i++) {
            $fromWeights[] = $headerAsList[$i - 1];
            $toWeights[] = $headerAsList[$i];
        }
        for ($i = 1; $i < count($excelData); $i++) {
            $zoneId = $excelData[$i]['A'];
            $row = array_values($excelData[$i]);
            $tariffs = [];
            for ($j = 0; $j < $headerColumnCount - 1; $j++) {
                $tariffs[$j]['zone_id'] = $zoneId;
                $tariffs[$j]['from_weight'] = $fromWeights[$j];
                $tariffs[$j]['to_weight'] = $toWeights[$j];
                $tariffs[$j]['price'] = $row[$j + 1];
                $tariffs[$j]['created_at'] = now();
            }
            Tariff::insert($tariffs);
        }

    }

    public function showExcel()
    {
        $tariffs = Tariff::all();
        return view('welcome', compact('tariffs'));
    }
}
