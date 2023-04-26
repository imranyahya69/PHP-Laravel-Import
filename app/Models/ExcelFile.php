<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelFile extends Model
{
    use HasFactory;

    protected $table = 'excel_files';
    protected $fillable = ['name', 'user_id'];

    /**
     * Get all of the excel details for the ExcelFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function excelDetails()
    {
        return $this->hasMany(ExcelDetail::class, 'excel_file_id', 'id');
    }

    /**
     * Get the user that owns the ExcelFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
