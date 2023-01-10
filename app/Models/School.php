<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setNomorTelponAttribute($value)
    {
        if ($value[0] == 0) {
            $value = $this->str_replace_limit('0', '62', $value, 1);
            // dd($value);
        }
        $this->attributes['nomor_telpon'] = $value;
    }
    public function setWhatsappAttribute($value)
    {
        if ($value[0] == 0) {
            $value = $this->str_replace_limit('0', '+62', $value, 1);
        }
        $this->attributes['whatsapp'] = $value;
    }
    public function getNomorTelponAttribute($value)
    {
        if ($value[0] == 6) {
            $value = '+' . $value;
        }
        return $value;
    }
    public function getWhatsappAttribute($value)
    {
        if ($value[0] == 6) {
            $value = '+' . $value;
        }
        return $value;
    }
    public function str_replace_limit($search, $replace, $subject, $limit, &$count = null)
    {
        $count = 0;
        if ($limit <= 0) {
            return $subject;
        }
        $occurancies = substr_count($subject, $search);
        if ($occurancies === 0) {
            return $subject;
        } elseif ($occurancies <= $limit) {
            return str_replace($search, $replace, $subject, $count);
        }
        $position = 0;
        for ($i = 0; $i < $limit; $i++) 
            $position = strpos($subject, $search, $position) + strlen($search);

        $substring = substr($subject, 0, $position + 1);
        $substring = str_replace($search, $replace, $substring, $count);

        return substr_replace($subject, $substring, 0, $position + 1);
    }
}
