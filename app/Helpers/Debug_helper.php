<?php
/**
 * varDebug ()  - Add this method to a CodeIgniter Helper.
 * I named mine - debug_helper.php
 * -----------------------------------------------------------------------
 *
 * Formatted output of var_dump() etc.;
 */
if ( ! function_exists('varDebug')) {
 /**
 * Debug Helper
 * -------------------------------------------------------------------
 * Outputs the given variable(s) with color formatting and location
 *
 */
 function varDebug(): void
 {
 [$callee] = debug_backtrace();

 $arguments = func_get_args();

 $total_arguments = func_num_args();

 echo '<div><fieldset style="background: #fff !important; border:1px red solid; padding:15px">';
 echo '<legend style="background: #fff; color: #000; padding:5px;">' . $callee['file'] . ' @line: ' .
     $callee['line'] . '</legend><pre><code>';

 $i = 0;
 foreach ($arguments as $argument) {
 echo '<strong>Debug #' . ++$i . ' of ' . $total_arguments . '</strong>: ' . '<br>';
 var_dump($argument);
 }

 echo "</code></pre></fieldset><div><br>";

 exit();
 }
} 
