<?php


namespace Data;


use Entities\Picture;

class PictureDAO extends AbstractDataHandler
{
    const COLUMNS = [
        'picture_id'    => 'setId',
        'category_id'   => 'setCategory',
        'cover_picture' => 'setCoverPicture',
        'path'          => 'setPath',
        'comment'       => 'setComment',
        'category_name' => 'setCategoryName'
    ];

    public function getCoverPictures()
    {
        $rows = $this->select(
            'select c.id as category_id,
                           c.name as category_name,
                           p.id as picture_id,
                           p.path as path,
                           p.comment as comment
                    from dlp_category c
                    inner join dlp_picture p on (p.category = c.id and p.cover_picture = 1 and p.deleted = 0)
                    where c.deleted = 0',
            []
        );

        return $this->objectify($rows);
    }

    public function getPicturesByCategoryId($categoryId)
    {
        $rows = $this->select('select p.id as picture_id,
                                               p.category as category_id,
                                               c.name as category_name,
                                               p.cover_picture as cover_picture,
                                               p.path as path,
                                               p.comment as comment
                                        from dlp_picture p
                                        left join dlp_category c on (c.id = p.category)
                                        where p.category = :category_id and p.deleted = 0',
            [
                'category_id' => $categoryId,
            ]
        );

        return $this->objectify($rows);
    }

    private function objectify($rows)
    {
        $result = [];
        if (empty($rows)) {
            return null;
        }

        foreach ($rows as $row) {
            $picture = new Picture();

            foreach ($row as $column => $value) {
                $picture->{self::COLUMNS[$column]}($value);
            }
            $result[] = $picture;
        }

        return $result;
    }
}