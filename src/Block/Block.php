<?php

namespace Radchasay\Block;

class Block
{
    /**
     * This will suppress UnusedLocalVariable
     * warnings in this method
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function sidebar($links)
    {
        $sidebar = "<nav class='sidebar'><ul>";
        foreach ($links as $row => $innerarray) {
            foreach ($innerarray as $key => $value) {
                $sidebar .= "<li><a href='$key'>$value</a></li>";
            }
        }
        $sidebar .= "</ul></nav>";

        echo $sidebar;
    }

    public function footer($text, $class = "")
    {
        echo "<footer class='$class'><p>$text</p></footer>";
    }
}
