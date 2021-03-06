<?php
namespace App\Repository;

class TestComparison
{
    public static function get()
    {
        return array(
            array('CamelCasePregReplaceTest', 'CamelCaseStringsTest'),
            array('IncrementBeforeTest', 'IncrementAfterTest'),
            array('DateStrtotimeTest', 'ExplodeTest'),
            array('EmptyTest', 'NotIssetTest'),
            array('IssetTest', 'NotEmptyTest'),
            array('SubstrExtensionTest', 'PathinfoExtensionTest'),
            array('ExplodeExtensionTest', 'PathinfoExtensionTest'),
            array('IsFileTest', 'FileExistsTest'),
            array('StrReplaceTest', 'StrIReplaceTest'),
            array('StrReplaceTest', 'PregReplaceTest'),
            array('ArrayUniqueTest', 'ForeachUniqueInArrayTest'),
            array('InArrayTest', 'InArrayStrictTest'),
            array('IncludeTest', 'RequireTest'),
            array('IfElseifElseTest', 'SwitchTest'),
            array('LoopForTest', 'LoopForeachKeyValueTest'),
            array('LoopForTest', 'LoopForeachValueTest'),
            array('LoopForeachKeyValueTest', 'LoopWhileTest')
        );
    }
}
