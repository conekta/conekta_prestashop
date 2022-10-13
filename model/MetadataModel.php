<?php

require 'QueryBuilder.php';

class MetadataModel extends QueryBuilder
{
    protected $table = 'conekta_metadata';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $user_id
     * @param $mode
     * @param $metaOptions
     * @return mixed
     */
    public function getConektaMetadata($user_id, $mode, $metaOptions)
    {
        $sql = $this->where('meta_option', $metaOptions)
            ->where('id_user', $user_id)
            ->where('mode', $mode)
            ->getSelectQuery(['meta_value']);

        return $this->db->getRow($sql);
    }

    public function updateConektaMetadata($userId, $mode, $metaOptions, $metaValue)
    {
        if (empty($this->getConektaMetadata($userId, $mode, $metaOptions))) {
            return $this->insertConektaMetadata($userId, $mode, $metaOptions, $metaValue);
        }

        $sql = $this->where('id_user', $userId)
            ->where('meta_option', $metaOptions)
            ->where('mode', $mode)
            ->getUpdateQuery([
                'id_user' => $userId,
                'meta_option' => $metaOptions,
                'meta_value' => $metaValue
            ]);

        return $this->db->Execute($sql);
    }

    public function insertConektaMetadata($userId, $mode, $metaOptions, $meta_value)
    {
        $sql = $this->getInsertQuery([
            'id_user'     => $userId,
            'mode'        => $mode,
            'meta_option' => $metaOptions,
            'meta_value'  => $meta_value
        ]);

        return $this->db->Execute($sql);
    }
}