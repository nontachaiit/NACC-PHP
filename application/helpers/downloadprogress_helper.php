<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function download_progress ( $file_dir, $file_name, $speed=4096 )
{
	$file_size=filesize($file_dir. "/" . $file_name);
    // Open the file
    $fh=fopen($file_dir . "/" .$file_name, "r");

    // Initialize the range of bytes to be transferred
    $start=0;
    $end=$file_size-1;

    // Check HTTP_RANGE variable
    if(isset($_SERVER['HTTP_RANGE']) &&
    		preg_match('/^bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $arr)){

		// Starting byte
		$start=$arr[1];
        if($arr[2]){
        	// Ending byte
            $end=$arr[2];
		}
	}

    // Check if starting and ending byte is valid
    if($start>$end || $start>=$file_size){
            header("HTTP/1.1 416 Requested Range Not Satisfiable");
            header("Content-Length: 0");
    }
    else{
		// For the first time download
        if($start==0 && $end==$file_size){
        	// Send HTTP OK header
            header("HTTP/1.1 200 OK");
		}
        else{
        	// For resume download
            // Send Partial Content header
            header("HTTP/1.1 206 Partial Content");
            // Send Content-Range header
            header("Content-Range: bytes ".$start."-".$end."/".$file_size);
		}

        // Bytes left
        $left=$end-$start+1;

		// Send the other headers
        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        // Content length should be the bytes left
        header("Content-Length: ".$left);
        header("Content-Disposition: attachment; filename=".$file_name);

		// Read file from the given starting bytes
        fseek($fh, $start);
        // Loop while there are bytes left
        while($left>0){
        	// Bytes to be transferred
            // according to the defined speed
            $bytes=$speed*1024;
            // Read file per size
            echo fread($fh, $bytes);
            // Flush the content to client
            flush();
            // Substract bytes left with the tranferred bytes
            $left-=$bytes;
            // Delay for 1 second
            sleep(1);
		}
    }

    fclose($fh);
}



function multi_download_progress ( $file_dir, $aFileName, $speed=4096 )
{
	$total_file_size = 0;

	$aFileSizeStart = array ();

	for ( $i = 0; $i < count($aFileName); $i++ ) {
		// keep start point for each file
		$aFileSizeStart[] = $total_file_size;

		$total_file_size += filesize($file_dir. "/" . $aFileName[$i]);
	}

    // Initialize the range of bytes to be transferred
    $start=0;
    $end=$total_file_size-1;

    // Check HTTP_RANGE variable
    if(isset($_SERVER['HTTP_RANGE']) &&
    		preg_match('/^bytes=(\d+)-(\d*)/', $_SERVER['HTTP_RANGE'], $arr)){

		// Starting byte
		$start=$arr[1];
        if($arr[2]){
        	// Ending byte
            $end=$arr[2];
		}
	}

    // Check if starting and ending byte is valid
    if($start>$end || $start>=$total_file_size){
            header("HTTP/1.1 416 Requested Range Not Satisfiable");
            header("Content-Length: 0");
    }
    else{
		// For the first time download
        if($start==0 && $end==$total_file_size){
        	// Send HTTP OK header
            header("HTTP/1.1 200 OK");
		}
        else{
        	// For resume download
            // Send Partial Content header
            header("HTTP/1.1 206 Partial Content");
            // Send Content-Range header
            header("Content-Range: bytes ".$start."-".$end."/".$total_file_size);
		}

        // Bytes left
        $left=$end-$start+1;

		$file_name = "";

		for ( $i = 0; $i < count ( $aFileName ); $i++ ) {
			if ( $start <= $aFileSizeStart[$i] ) {
				$file_name = $aFileName[$i];
				break;
			}
		}

		// Send the other headers
        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        // Content length should be the bytes left
        header("Content-Length: ".$left);
        header("Content-Disposition: attachment; filename=".$file_name);

	    // Open the file
	    $fh=fopen($file_dir . "/" .$file_name, "r");

		// Read file from the given starting bytes
        fseek($fh, $start);
        // Loop while there are bytes left
        while($left>0){
        	// Bytes to be transferred
            // according to the defined speed
            $bytes=$speed*1024;
            // Read file per size
            echo fread($fh, $bytes);
            // Flush the content to client
            flush();
            // Substract bytes left with the tranferred bytes
            $left-=$bytes;
            // Delay for 1 second
            sleep(1);
		}
    }

    fclose($fh);
}
