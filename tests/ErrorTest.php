<?php
require_once dirname(__FILE__) . '/../src/Ilib/Error.php';

class ErrorTest extends PHPUnit_Framework_TestCase
{
    protected $error;
    
    function setUp() 
    {
        $this->error = new Ilib_Error;
    }

    function testConstruction()
    {
        $this->assertEquals('Ilib_Error', get_class($this->error));
    }
    
    function testSetError() 
    {
        $this->error->set('first error');
        $this->assertEquals(1, $this->error->count());
    }
    
    function testView() 
    {
        $this->error->set('first error');
        $this->assertEquals('<ul class="formerrors"><li>first error</li></ul>', $this->error->view());
        
    }

    function tearDown()
    {
        unset($this->error);
    }
    
}

