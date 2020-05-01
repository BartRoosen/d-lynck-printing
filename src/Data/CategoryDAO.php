<?php


namespace Data;

use Entities\Category;

class CategoryDAO extends AbstractDataHandler
{
    const COLUMNS = [
        'id'   => 'setId',
        'name' => 'setName',
    ];

    public function getCategoryById($categoryId)
    {
        $rows = $this->select(
            'select id,
                           name
                    from dlp_category
                    where id = :id and deleted = 0',
            [
                ':id' => $categoryId,
            ]
        );

        return $this->objectify($rows, true);
    }

    private function objectify($rows, $singleObject = false)
    {
        $result = [];
        if (empty($rows)) {
            return null;
        }

        foreach ($rows as $row) {
            $picture = new \Entities\Category();

            foreach ($row as $column => $value) {
                $picture->{self::COLUMNS[$column]}($value);
            }
            $result[] = $picture;
        }

        if ($singleObject) {

            return $result[0];
        }

        return $result;
    }
}