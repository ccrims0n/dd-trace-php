--TEST--
[Sandbox regression] Throw exception in strict mode if traced class does not exist
--XFAIL--
This functionality does not exist for sandboxed tracing closures
--INI--
ddtrace.strict_mode=1
--FILE--
<?php
try {
    dd_trace_method("ThisClassDoesntExists", "m", function($s, $a, $retval){
        echo $retval . "METHOD HOOK" . PHP_EOL;
    });
} catch (InvalidArgumentException $ex) {
    echo $ex->getMessage() . PHP_EOL;
}

?>
--EXPECTF--
class not found
