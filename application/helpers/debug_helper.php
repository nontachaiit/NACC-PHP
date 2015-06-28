<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Debug{

	protected static $_sapi = null;

    public static function getSapi()
    {
        if (self::$_sapi === null) {
            self::$_sapi = PHP_SAPI;
        }
        return self::$_sapi;
    }

    public static function setSapi($sapi)
    {
        self::$_sapi = $sapi;
    }
	public static function dump($var, $label=null, $echo=true)
    {

        $label = ($label===null) ? '' : rtrim($label) . ' ';

        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        if (self::getSapi() == 'cli') {
            $output = PHP_EOL . $label
                    . PHP_EOL . $output
                    . PHP_EOL;
        } else {
            if(!extension_loaded('xdebug')) {
                $output = htmlspecialchars($output, ENT_QUOTES);
            }

            $output = '<pre>'
                    . $label
                    . $output
                    . '</pre>';
        }

        if ($echo) {
            echo($output);
        }
        return $output;
    }
}
?>