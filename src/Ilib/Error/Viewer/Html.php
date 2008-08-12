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
        if (is_object($translation)) {
            $e = '<ul class="formerrors">';
            foreach ($this->error->getMessage() AS $error) {
                $e .= '<li>' . $translation->get($error) . '</li>';
            }
            $e .= '</ul>';
            return $e;
        } else {
            $e = '<ul class="formerrors">';
            foreach ($this->error->getMessage() AS $error) {
                $e .= '<li>' . $error . '</li>';
            }
            $e .= '</ul>';
            return $e;
        }
    }

}
?>
