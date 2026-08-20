<?php
// app/Models/Modal.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_modal extends Model
{
    protected $table = 'tbl_modal';
    protected $primaryKey = 'target_id';
    public $timestamps = false; // created_at/updated_at are plain `date` columns, not Eloquent timestamps
}