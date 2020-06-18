--TEST--
[Sandbox regression] Trace protected method
--FILE--
<?php

class Test
{
    public function m()
    {
        echo "METHOD" . PHP_EOL;
        $this->protected_method();
    }

    protected function protected_method()
    {
        echo "PROTECTED METHOD" . PHP_EOL;
    }
}

dd_trace_method("Test", "protected_method", function(){
    echo "PROTECTED HOOK" . PHP_EOL;
});

(new Test())->m();

?>
--EXPECT--
METHOD
PROTECTED METHOD
PROTECTED HOOK
