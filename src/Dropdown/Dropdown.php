<?php

namespace Radchasay\Dropdown;

class Dropdown implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;

    public function createDropdownList()
    {
        $sql = "SELECT email FROM setup_user";
        $res = $this->app->db->executeFetchAll($sql);
        $select = "<form action='' method='post' class='dropdownList'>";
        $select .= "<label><h2>Select user to edit</h2></label>";
        $select .= "<select name='userSelect'>";
        foreach ($res as $row) {
            $select .= "<option value='$row[email]'>$row[email]</option>";
        }
        $select .= "</select>";
        $select .= "<input type=\"submit\" name=\"submitButton\" value=Select User\">";
        $select .= "</form>";
        return $select;
    }
}
