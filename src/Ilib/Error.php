<?php
/**
 * Fejlhåndtering
 *
 * Bruges til at samle og returnere fejlbeskeder
 *
 * @author Sune Jensen
 * @author Lars Olesen
 * @version 1.1
 */
class Ilib_Error
{
    /**
     * @var array
     */
    private $message;

    /**
     * @var object
     */
    public $viewer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->message = array();
    }

    /**
     * sætter er en fejlbesked
     *
     * @param string $msg fejlbeskeden
     *
     * @return void
     */
    public function set($msg)
    {
        if (!empty($msg)) {
            $this->message[] = $msg;
        } else {
            $this->message[] = 'Udefinderet fejlbesked!';
        }
    }

    /**
     * merge another error array with this
     *
     * @param array $error_array array provided with errormessages
     *
     * @return void
     */
    public function merge($error_array)
    {
        if (is_array($error_array)) {
            $this->message = array_merge($this->message, $error_array);
        }
    }

    /**
     * Returnere om der er fejl
     *
     * @return boolean true hvis fejl, false hvis ikke
     */
    public function isError()
    {
        if ($this->count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Tæller antaller af fejl
     *
     * @return integer antallet af fejl
     */
    public function count()
    {
        return(count($this->message));
    }

    /**
     * Returnere fejlbeskeder som et array
     *
     * @return array Array med fejlbeskeder
     */
    public function getMessage()
    {
        return($this->message);
    }

    /**
     * View the messages
     *
     * @param object $translation Translation object
     *
     * @return void echoes out a string
     */
    public function view($translation = '')
    {
        if ($this->count() > 0) {
            require_once 'Ilib/Error/Viewer/Html.php';
            $this->viewer = new Ilib_Error_Viewer_Html($this);
            return $this->viewer->view($translation);
        }
    }
}
