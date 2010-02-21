<?php
/**
 * Bruges til at udskrive fejlmeddelelser
 *
 * @author Lars Olesen <lars@legestue.net>
 */
class Ilib_Error_Viewer_Html {

    private $error;

    /**
     * Constructor
     *
     * Ved at lave en reference til $error burde den kunne samle
     * alle ændringer sammen.
     */
    public function __construct($error) {
        if (!is_object($error)) {
            die('ErrorHtmlViewer kræver Errorobjekt');
        }
        $this->error = $error;
    }

    /**
     * Views the error
     *
     * @param object $translation
     *
     * @return string
     */
    public function view($translation) {
        $e = '<ul class="formerrors">';
        if(is_array($translation)) {
            foreach ($this->error->getMessage() AS $error) {
                $e .= '<li>' . call_user_func($translation, $error) . '</li>';
            }
        }
        elseif (is_object($translation)) {
            foreach ($this->error->getMessage() AS $error) {
                $e .= '<li>' . $translation->get($error) . '</li>';
            }
        } else {
            foreach ($this->error->getMessage() AS $error) {
                $e .= '<li>' . $error . '</li>';
            }
        }
        
        $e .= '</ul>';
        return $e;
    }

}
?>
