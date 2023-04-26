<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelDetail extends Model
{
    use HasFactory;

    protected $table = 'excel_details';
    protected $fillable = ['excel_file_id', 'is_heading', 'value', 'row_number'];


    /**
     * Get the excel file that owns the ExcelDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function excelFile()
    {
        return $this->belongsTo(ExcelFile::class, 'excel_file_id', 'id');
    }

    public static function heading($id = null)
    {
        $heading = self::where('is_heading', true);
        if ($id)
            $heading->where('excel_file_id', $id);
        return $heading->pluck('value');
    }

    public static function body($id = null)
    {
        $heading = self::where('is_heading', false);
        if ($id)
            $heading->where('excel_file_id', $id);
        return $heading->pluck('value');
    }
}
