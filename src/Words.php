<?php

namespace LTE;


class Words extends \SplFileObject
{
    public function __construct($file_name)
    {
        parent::__construct($file_name);

        $this->setFlags(parent::READ_CSV | parent::READ_AHEAD | parent::SKIP_EMPTY | parent::DROP_NEW_LINE);
    }

    public function asAssocArray()
    {
        $data = $fields = [];
        $i = 0;

        while( ! $this->eof()) {
            $row = $this->fgetcsv();

            if ( ! $row)
                continue;

            if (empty($fields)) {
                $fields = $row;
                continue;
            }

            foreach ($row as $k => $value) {
                $data[$i][$fields[$k]] = $value;
            }

            $i++;
        }

        return $data;
    }
}