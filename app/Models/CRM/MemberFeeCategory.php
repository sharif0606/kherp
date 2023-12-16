<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberFeeCategory extends Model
{
    use HasFactory;
    public function membertype(){
        return $this->belongsTo(MembershipType::class,'membership_type_id','id');
    }
}
