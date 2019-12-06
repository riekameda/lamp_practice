<?php
function sample(){
    print 'sample';
}

//sample();

//abc();
print_hello_name('佐藤');
//$return_hello_name = return_hello_name('鈴木');

//print $return_hello_name . "\n";

function abc() {
    print 'print_hello関数: hello' . "\n";
}
function print_hello_name($name = 'nanashi') {
    print 'print_hello_name関数: hello ' . $name . "\n";
}
function return_hello_name($name) {
    $str = 'return_hello_name関数: hello ' . $name . "\n";
    return $str;
}
    ?>