<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    //
    protected $table = 'incomes';

    public function partidas()
    {
        return DB::table('income_rows')->where('income_id', '=', $this->id)->get();
        //return $this->hasMany(Partida_Entrada::class);
    }

    public function dias()
    {
        date_default_timezone_set("America/Hermosillo");
        return $this->getWeekends($this->fecha, date("Y-m-d"));
    }

    function getWeekends($startDate, $endDate)
    {
        $begin = strtotime($startDate);
        $end   = strtotime($endDate);
        if ($begin > $end) {

            return 0;
        } else {
            $no_days  = 0;
            
            while ($begin <= $end) {
            $begin += 86400; // +1 day
                $what_day = date("N", $begin);
                if (in_array($what_day, [6,7]) ) // 6 and 7 are weekend
                    $no_days++;
            };

            return $no_days;
        }
    }
}
