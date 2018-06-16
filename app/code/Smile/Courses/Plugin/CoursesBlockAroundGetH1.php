<?php
namespace Smile\Courses\Plugin;

use Smile\Courses\Block\Course;

class CoursesBlockAroundGetH1
{
    public function aroundGetH1(Course $block, \Closure $proceed)
    {
        $result = $proceed();

        return $result . ' Around plugin ' . get_class($block);
    }
}