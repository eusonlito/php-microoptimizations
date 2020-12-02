<?php
namespace App\Database\Model\Helper;

class Result
{
    public static function versionSort($results)
    {
        usort($results, function ($a, $b) {
            return version_compare($a->version, $b->version, '>');
        });

        return $results;
    }

    public static function compare($results1, $results2)
    {
        $groups1 = self::getGroups($results1);
        $groups2 = self::getGroups($results2);

        $groups1 = self::cleanGroups($groups1, $groups2);
        $groups2 = self::cleanGroups($groups2, $groups1);

        return self::compareGroups($results1, $results2);
    }

    private static function getGroups($results)
    {
        $groups = array();

        foreach ($results as $row) {
            $groups[$row->version.'|'.$row->loop]['results'] = $row;
        }

        return $groups;
    }

    private static function cleanGroups($group1, $group2)
    {
        foreach (array_keys($group1) as $key) {
            if (empty($group2[$key]) && is_object($group1[$key])) {
                $group1[$key]->percent = null;
            }
        }

        return $group1;
    }

    private static function compareGroups($group1, $group2)
    {
        foreach ($group1 as $key => $row1) {
            if (empty($group2[$key])) {
                continue;
            }

            $row2 = $group2[$key];

            $fast = ($row1->time < $row2->time) ? $row1->time : $row2->time;

            $group1[$key]->percent = round(($row1->time * 100) / $fast);
            $group2[$key]->percent = round(($row2->time * 100) / $fast);
        }

        return array($group1, $group2);
    }
}
