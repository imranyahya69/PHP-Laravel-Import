<?php

namespace App\Services;

use App\Models\ExcelDetail;
use App\Models\ExcelFile;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ExcelService
{
    public function storeExcelData($request)
    {
        try {
            DB::beginTransaction();
            $file = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);

            $excelFile =  new ExcelFile;
            $excelFile->name = $filename . '.' . $extension;
            $excelFile->user_id = auth()->user()->id ?? 1;

            if ($excelFile->save()) {
                $excelData = Excel::toArray(null, $request->file('file'))[0];
                $insertionArray = array();
                $counter = 0;
                foreach ($excelData as $key => $data) {
                    foreach ($data as $detail) {
                        $insertionArray[$counter]['excel_file_id'] = $excelFile->id;
                        $insertionArray[$counter]['value'] = $detail;
                        $insertionArray[$counter]['is_heading'] = false;
                        if ($key == 0) {
                            $insertionArray[$counter]['is_heading'] = true;
                        }
                        $insertionArray[$counter]['created_at'] = date('Y-m-d h:i:s');
                        $counter++;
                    }
                }
                ExcelDetail::insert($insertionArray);
                DB::commit();
            }
            return ['status' => 'success', 'message' => 'Excel sheet Successfully inserted'];
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error($e->getMessage());
            return ['status' => 'error', 'message' => 'An error occured. Please try again'];
        }
    }

    public function showExcelDetail($excelFileId)
    {
        $headings = ExcelDetail::heading($excelFileId);
        $excelData = ExcelDetail::body($excelFileId);
        $headingCount = count($headings);
        if ($headings && $excelData) {
            return ['headings' => $headings, 'excelData' => $excelData, 'headingCount' => $headingCount];
        }
        return ['status' => 'error', 'message' => 'Data not found'];
    }
}
