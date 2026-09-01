<?php
// app/Models/Modal.php
namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_investorportfolios extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_investorportfolios';
    protected $primaryKey = 'id';
    public $timestamps = false; // created_at/updated_at are plain `date` columns, not Eloquent timestamps
}