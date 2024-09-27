<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru'; 
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function mapel(){
        return $this->belongsToMany(Mapel::class, 'guru_mapel');
    }

    public function jadwal_list(){
        return $this->hasMany(JadwaList::class);
    }


}