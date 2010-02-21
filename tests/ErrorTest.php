<?php
require_once 'PHPUnit/Framework.php';
require_once '../src/Ilib/Error.php';

class ErrorTest extends PHPUnit_Framework_TestCase
{
    function testConstruction()
    {
        $error = new Ilib_Error;
        $this->assertEquals('Ilib_Error', get_class($error));
    }
    
    function testSetError() {
        $error = new Ilib_Error;
        
        $error->set('first error');
        $this->assertEquals(1, $error->count());
    }
    
    function testView() {
        
        $error = new Ilib_Error;
        
        $error->set('first error');
        
        $this->assertEquals('<ul class="formerrors"><li>first error</li></ul>', $error->view());
        
    }
}
?>
