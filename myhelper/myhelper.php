<?php 

if (!function_exists('format_rupiah')) {
	# code...
	// function format_rupiah($angka=0)
	// {
	//  $jadi = "Rp " . number_format($angka,2,',','.');
	// return $jadi;
	// }

	function format_rupiah($angka=0)
	{
	 $jadi = number_format($angka,2,',','.');
	return $jadi;
	}

}
if (!function_exists('UPPER')) {
	# code...
	function UPPER($STR_TO_UPPER=' ')
	{
	 $jadi = strtoupper($STR_TO_UPPER);
	return $jadi;
	}

}
if (!function_exists('isDateId')) {
	function isDateId($date){
	  return 1 === preg_match(
	    '~^(((0[1-9]|[12]\\d|3[01])\\/(0[13578]|1[02])\\/((19|[2-9]\\d)\\d{2}))|((0[1-9]|[12]\\d|30)\\/(0[13456789]|1[012])\\/((19|[2-9]\\d)\\d{2}))|((0[1-9]|1\\d|2[0-8])\\/02\\/((19|[2-9]\\d)\\d{2}))|(29\\/02\\/((1[6-9]|[2-9]\\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$~',
	    $date
	  );
	}
}

if (!function_exists('sq')) {
	function sq($date){
	  Event::listen('illuminate.query', function($query)
	  {
	    // echo "<pre>";
	      var_dump($query);  	
	  });
	}
}
if (!function_exists('button_refresh')) {
	// $button_refresh='<span id="reload_penerima_id"><i class="fa fa-refresh fa-lg"></i></span>';
	function button_refresh($id='id')
	{  // reload_penerima_id
	  return '<span id="'.$id.'"><i class="fa fa-refresh fa-lg"></i></span>';
	}
}
// if (!function_exists('easy')) {
// 	function easy($file='')
// 	{
// 		return view('easy.layout.'.$file);
// 	}
	
// }
// if (!function_exists('easyc')) {
	
// 	function easyc($file='', $id=[])
// 	{
// 		return view('easy.content.'.$file, $id);
// 	}
// }
if (!function_exists('getHariKerja')) {

	// function getWorkingDays($startDate,$endDate,$holidays) {
	function getHariKerja($startDate,$endDate,$holidays) {
    // do strtotime calculations just once
		$endDate = strtotime($endDate);
		$startDate = strtotime($startDate);
    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //We add one to inlude both dates in the interval.
		$days = ($endDate - $startDate) / 86400 + 1;

		$no_full_weeks = floor($days / 7);
		$no_remaining_days = fmod($days, 7);

    //It will return 1 if it's Monday,.. ,7 for Sunday
		$the_first_day_of_week = date("N", $startDate);
		$the_last_day_of_week = date("N", $endDate);

    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
		if ($the_first_day_of_week <= $the_last_day_of_week) {
			if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
			if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
		}
		else {
        // (edit by Tokes to fix an edge case where the start day was a Sunday
        // and the end day was NOT a Saturday)

        // the day of the week for start is later than the day of the week for end
			if ($the_first_day_of_week == 7) {
            // if the start date is a Sunday, then we definitely subtract 1 day
				$no_remaining_days--;

				if ($the_last_day_of_week == 6) {
                // if the end date is a Saturday, then we subtract another day
					$no_remaining_days--;
				}
			}
			else {
            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
            // so we skip an entire weekend and subtract 2 days
				$no_remaining_days -= 2;
			}
		}

    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
		$workingDays = $no_full_weeks * 5;
		if ($no_remaining_days > 0 )
		{
			$workingDays += $no_remaining_days;
		}

    //We subtract the holidays
		foreach($holidays as $holiday){
			$time_stamp=strtotime($holiday);
        //If the holiday doesn't fall in weekend
			if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
				$workingDays--;
		}

		return $workingDays;
	}

	
}

if (!function_exists('cekTelat')) {

	function cekTelat($startDate,$endDate,$holidays)
	{
		// echo getHariKerja($startDate,$endDate,$holidays);
		 return getHariKerja($startDate,$endDate,$holidays)>2?getHariKerja($startDate,$endDate,$holidays)-2:0;
		
	}
}



?>