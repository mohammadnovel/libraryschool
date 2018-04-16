<?php
/**
*
*/
namespace App\Helpers;
use DB;

class AutoNumber
{
	public static function autoNumber($table,$primary,$prefix){
        $q=DB::table($table)->select(DB::raw('MAX(RIGHT('.$primary.',3)) as kd_max'));
        $prx=$prefix;
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prx.sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = $prx."0001";
        }

        return $kd;
    }

		public static function autoNumberIn($table,$primary){
	        $q=DB::table($table)->select(DB::raw('MAX(RIGHT('.$primary.',3)) as kd_max'));
	        if($q->count()>0)
	        {
	            foreach($q->get() as $k)
	            {
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = '1'.sprintf("%03s", $tmp);
	            }
	        }
	        else
	        {
	            $kd = "1000";
	        }

	        return $kd;
	    }
}
