<?php
/**
 * Created by PhpStorm.
 * User: Emad
 * Date: 7/1/2019
 * Time: 7:54 PM
 */

namespace App\Enum;


class Level
{
    const BEGINNER = 1;
    const INTRO_FIRST_PART_ONE = 2;
    const INTRO_FIRST_PART_TWO = 3;
    const INTRO_SECOND_PART_ONE = 4;
    const INTRO_SECOND_PART_TWO = 5;
    const INTRO_THIRD_PART_ONE = 6;
    const INTRO_THIRD_PART_TWO = 7;

    public static function getLevel($key)
    {
        switch ($key)
        {
            case self::BEGINNER: return "المرحلة التمهيدية"; break;
            case self::INTRO_FIRST_PART_ONE: return "المرحلة المقدمات الاولى المستوى الاول"; break;
            case self::INTRO_FIRST_PART_TWO: return "المرحلة المقدمات الاولى المستوى الثاني"; break;
            case self::INTRO_SECOND_PART_ONE: return "المرحلة المقدمات الثانية المستوى الاول"; break;
            case self::INTRO_SECOND_PART_TWO: return "المرحلة المقدمات الثانية المستوى الثاني"; break;
            case self::INTRO_THIRD_PART_ONE: return "المرحلة المقدمات الثالثة المستوى الاول"; break;
            case self::INTRO_THIRD_PART_TWO: return "المرحلة المقدمات الثالثة المستوى الثاني"; break;
        }
    }
}