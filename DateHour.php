<?php 
/**
 * Class for handling of date and time
 * 
 * @author Tayron Miranda <dev@tayron.com.br>
 * @since 09/07/2014 - 08:29
 */
class DateHour extends DateTime {
 
    public function __construct($time = null, $object = null) {
        parent::__construct($time, ( $object ) ? new DateTimeZone('America/Sao_Paulo') : $object);
    }
 
    /**
     * Method that validates whether a date is valid
     * <pre>
     * <code>
     *   echo DateHour::checkdate(2014, 01, 12);
     * </code>
     * </pre>
     * 
     * @access static          
     * @param int $year  Year in number     
     * @param int $day   Day in number
     * @param int $month Month in number
     * @return boolean
     */
    public static function checkdate($year, $day, $month) {
        if (!is_int($month)) {
            throw new Exception('First parameter must be an integer and positive');
        }
        if (!is_int($day)) {
            throw new Exception('second parameter must be an integer and positive');
        }
        if (!is_int($year)) {
            throw new Exception('Third parameter should be an integer and positive');
        }
        return checkdate($month, $day, $year);
    }
 
    /**
     * Method that validates whether an hour is valid
     * <pre>
     * <code>
     *   echo DateHour::checkhour(23, 01, 59);
     * </code>
     * </pre>
     * 
     * @access static
     * @param type $hour Hour of 0 at 23
     * @param type $minute Minute of 0 at 59
     * @param type $second Secunde of 0 at 59     
     * @throws Exception First parameter must be an integer and positive', 
     * second parameter must be an integer and positive', 
     * Third parameter should be an integer and positive'
     * @return boolean
     */
    public static function checkhour($hour, $minute, $second) {
 
        if (!is_int($hour)) {
            throw new Exception('First parameter must be an integer and positive');
        }
        if (!is_int($minute)) {
            throw new Exception('second parameter must be an integer and positive');
        }
        if (!is_int($second)) {
            throw new Exception('Third parameter should be an integer and positive');
        }
 
        if ($hour < 0 OR $hour > 23) {
            return false;
        } else if ($minute < 0 OR $minute > 59) {
            return false;
        } else if ($second < 0 OR $second > 59) {
            return false;
        }
 
        return true;
    }
 
    /**
     * Method that adds days to a given date
     * <pre>
     * <code>
     *   echo DateHour::sumDayUseful(10)->format('d/m/Y H:i:s');
     * </code>
     * </pre>
     * 
     * @access static
     * @param int $dayToSum Number of days useful
     * @param string $date Date for increment
     * @throws Exception First parameter must be an integer and positive', 
     * @return Object DateTime
     */
    public static function sumDayUseful($dayToSum, $date = null) {
 
        if (!is_int($dayToSum)) {
            throw new Exception('First parameter should be an integer and positive');
        }
 
        $now = new DateHour($date);
 
        for($day = 0; $day < $dayToSum; $day++) {
            $now = $now->add(new DateInterval('P1D')); 
            if (in_array($now->format('w'), array(0, 6)) OR in_array($now->format('Y-m-d'), self::getRecess((int)$now->format('Y')))) {
                continue;
            }            
        }
 
        return $now;
    }
 
    /**
     * Method that returns an array of recess
     * <pre>
     * <code>
     *   echo DateHour::getRecess(2014);
     * </code>
     * </pre>
     * 
     * @access static
     * @param int $year Year current
     * @throws Exception First parameter must be an integer and positive', 
     * @return array Array of recess
     */
    public static function getRecess($year) {
 
        if (!is_int($year)) {
            throw new Exception('First parameter should be an integer and positive');
        }
 
        $dia = 86400;
        $dates = array();
        $dates['pascoa'] = easter_date($year);
        $dates['sexta_santa'] = $dates['pascoa'] - (2 * $dia);
        $dates['carnaval'] = $dates['pascoa'] - (47 * $dia);
        $dates['corpus_cristi'] = $dates['pascoa'] + (60 * $dia);
 
        $recess = array (
            $year . '-01-01', // New year
            date('Y-m-d', $dates['carnaval']),
            date('Y-m-d', $dates['sexta_santa']),
            date('Y-m-d', $dates['pascoa']),
            $year . '-04-21', // Tiradentes
            $year . '-05-01', // Dia do trabalho
            date('Y-m-d', $dates['corpus_cristi']),
            $year . '-09-20', // Revolution Farroupilha
            $year . '-10-12', // ossa Sr.a Aparecida - Padroeira do Brasil
            $year . '-11-02', // Finados
            $year . '-11-15', // Proclamação da República
            $year . '-12-25' // Natal
        );
        return $recess;
    }
}