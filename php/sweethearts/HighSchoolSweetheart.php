<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return mb_substr(trim($name), 0, 1);
    }

    public function initial(string $name): string
    {
        $init = $this->firstLetter($name);
        return mb_strtoupper($init) . ".";
    }

    public function initials(string $name): string
    {
        $name_parts = explode(" ", $name);
        return $this->initial($name_parts[0]) . " " . $this->initial($name_parts[1]);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $name_a = $this->initials($sweetheart_a);
        $name_b = $this->initials($sweetheart_b);

        return <<<EOD
        ******       ******
      **      **   **      **
    **         ** **         **
   **            *            **
   **                         **
   **     $name_a  +  $name_b     **
    **                       **
      **                   **
        **               **
          **           **
            **       **
              **   **
                ***
                 *
   EOD;
   
    }
}
