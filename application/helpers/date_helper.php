<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
if ( ! function_exists('getDateChangeSymbol') ) {
	function getDateChangeSymbol( $oldSymbol, $newSymbol, $date, $isReverse )
	{
		$aExplore = explode( $oldSymbol, $date );
		$newDate = "";
		if( $isReverse ) {
			$newDate = $aExplore[2] . $newSymbol . $aExplore[1] . $newSymbol . $aExplore[0];
		}
		else {
			$newDate = $aExplore[0] . $newSymbol . $aExplore[1] . $newSymbol . $aExplore[2];
		}
		return $newDate;
	}
}


if ( ! function_exists('getDateDiffType') ) {
	function getDateDiffType( $date1, $date2 )
	{
		$date1Value = strtotime( $date1 );
		$date2Value = strtotime( $date2 );

		$val = 0;
		if( $date1Value == $date2Value ) {
			$val = 0;
		}
		else if( $date1Value > $date2Value ) {
			$val = 1;
		}
		else if( $date1Value < $date2Value ) {
			$val = -1;
		}
		return $val;
	}
}


if ( ! function_exists('dateDiff') ) {
	function dateDiff( $date1, $date2, $unit = "day" )
	{
		$date1Value = strtotime( $date1 );
		$date2Value = strtotime( $date2 );


		$diffSec = abs($date1Value - $date2Value );

		if ( $unit == "day" ) {
			$oneDaySec = 24 * 60 * 60;

			return floor($diffSec / $oneDaySec);
		} else if ( $unit == "hour" ) {
			$oneHourSec = 60 * 60;

			return floor($diffSec / $oneHourSec );
		} else if ( $unit == "minute" ) {
			$oneMinuteSec = 60;

			return floor ( $diffSec / $oneMinuteSec );
		} else if ( $unit == "second" ) {
			return $diffSec;
		}

	}
}

if ( ! function_exists ( "monthDiff" ) ) {
	function monthDiff ( $startDate, $endDate ) {
		// deprecated when server already had installed php 5.3 and up
		if ( function_exists ( "date_diff" ) ) {
			$datetime1 = date_create($startDate);
			$datetime2 = date_create($endDate);
			$interval = date_diff($datetime1, $datetime2);
			return ($interval->format ( "%y" ) * 12 + $interval->format ( "%m" ));
		} else { 
			$dateDiffTS = strtotime($endDate)-strtotime( $startDate );
			
			$month_diff = floor(($dateDiffTS)/2505600);
			
			return $month_diff;
		}
	}
}

if ( ! function_exists('getTotalDayOfMonth') ) {
	function getTotalDayOfMonth( $month, $year )
	{
		return cal_days_in_month (CAL_GREGORIAN, $month, $year);
	}
}


if ( ! function_exists('getDateDiffType') ) {	## Format Y/m/d, Y-m-d
	function getDateDiffType( $date1, $date2 )
	{
		$date1Value = strtotime( $date1 );
		$date2Value = strtotime( $date2 );

		$val = 0;
		if( $date1Value == $date2Value ) {
			$val = 0;
		}
		else if( $date1Value > $date2Value ) {
			$val = 1;
		}
		else if( $date1Value < $date2Value ) {
			$val = -1;
		}
		return $val;
	}
}


if ( ! function_exists('getDateTimeHumanView') ) {

	function getDateTimeHumanView( $date )	// input format "Y-m-d H:i:s"
	{
		$aDate = explode( " ", $date );
		$aTime = explode( ":", $aDate[1] );

		$dateView = getDateChangeSymbol( "-", "/", $aDate[0], true );
		$timeView = $aTime[0] . ":" . $aTime[1];

		return $dateView . " " . $timeView;
	}
}


if ( ! function_exists('getDateInLengthType') ) {	## Format Y/m/d, Y-m-d
	function getDateInLengthType( $dateStart, $dateExpire, $dateCheck )
	{
		$dateStartValue = strtotime( $dateStart );
		$dateExpireValue = strtotime( $dateExpire );
		$dateValue = strtotime( $dateCheck );


		$val = 0;
		if( $dateStartValue <= $dateValue && $dateExpireValue >= $dateValue ) {
			$val = 1;
		}

		return $val;
	}
}
*/

if ( ! function_exists('getDateChangeSymbol') ) {
	function getDateChangeSymbol( $oldSymbol, $newSymbol, $date, $isReverse )
	{
		$aExplore = explode( $oldSymbol, $date );
		$newDate = "";
		if( $isReverse ) {
			$newDate = $aExplore[2] . $newSymbol . $aExplore[1] . $newSymbol . $aExplore[0];
		}
		else {
			$newDate = $aExplore[0] . $newSymbol . $aExplore[1] . $newSymbol . $aExplore[2];
		}
		return $newDate;
	}
}


if ( ! function_exists('getDateDiffType') ) {
	function getDateDiffType( $date1, $date2 )
	{
		$date1Value = strtotime( $date1 );
		$date2Value = strtotime( $date2 );

		$val = 0;
		if( $date1Value == $date2Value ) {
			$val = 0;
		}
		else if( $date1Value > $date2Value ) {
			$val = 1;
		}
		else if( $date1Value < $date2Value ) {
			$val = -1;
		}
		return $val;
	}
}


if ( ! function_exists('dateDiff') ) {
	function dateDiff( $date1, $date2, $unit = "day" )
	{
		// deprecated when server already had installed php 5.3 and up
		if ( function_exists ( "date_diff" ) ) {
			$datetime1 = date_create($date1);
			$datetime2 = date_create($date2);
			
			$diff = date_diff($datetime1, $datetime2);
			
			return $diff->format ( '%r%a' );
			//echo "DATE DIFF";
			//var_dump ( $diff->format ( '%r%a') );
			//return $diff->y * 365.25 + $diff->m * 30 + $diff->d + $diff->h/24 + $diff->i / 60;
		} else { 
			$date1Value = strtotime( $date1 );
			$date2Value = strtotime( $date2 );
	
	
			$diffSec = abs($date1Value - $date2Value );
	
			if ( $unit == "day" ) {
				$oneDaySec = 24 * 60 * 60;
	
				return floor($diffSec / $oneDaySec);
			} else if ( $unit == "hour" ) {
				$oneHourSec = 60 * 60;
	
				return floor($diffSec / $oneHourSec );
			} else if ( $unit == "minute" ) {
				$oneMinuteSec = 60;
	
				return floor ( $diffSec / $oneMinuteSec );
			} else if ( $unit == "second" ) {
				return $diffSec;
			}
		}
	}
}

if ( ! function_exists ( "monthDiff" ) ) {
	function monthDiff ( $startDate, $endDate ) {
		// deprecated when server already had installed php 5.3 and up
		if ( function_exists ( "date_diff" ) ) {
			$datetime1 = date_create($startDate);
			$datetime2 = date_create($endDate);
			$interval = date_diff($datetime1, $datetime2);
			return ($interval->format ( "%y" ) * 12 + $interval->format ( "%m" ));
		} else { 
			$dateDiffTS = strtotime($endDate)-strtotime( $startDate );
			
			$month_diff = floor(($dateDiffTS)/2505600);
			
			return $month_diff;
		}
	}
}

if ( !function_exists ( "dateDiffFullFormat" ) ) {
	function dateDiffFullFormat ( $startDate, $endDate ) {
		// deprecated when server already had installed php 5.3 and up
		if ( function_exists ( "date_diff" ) ) {
			$datetime1 = date_create($startDate);
			$datetime2 = date_create($endDate);
			$interval = date_diff($datetime1, $datetime2);
			
			$str = "";
			if ( $interval->format ( "%y" ) > 0 ) {
				$str .= $interval->format ( "%y" ) . " year ";
			}
			
			if ( $interval->format ( "%m" ) > 0 ) {
				$str .= $interval->format ( "%m" ) . " month ";
			}
			
			if ( $interval->format ( "%d" ) > 0 ) {
				$str .= $interval->format ( "%d" ) . " day";
			}
			
			
			return $str;
		} else {
			return $endDate;
		}
	}
}

if ( ! function_exists('getTotalDayOfMonth') ) {
	function getTotalDayOfMonth( $month, $year )
	{
		return cal_days_in_month (CAL_GREGORIAN, $month, $year);
	}
}