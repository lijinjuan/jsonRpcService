<?php

namespace App\JsonRpc;

interface TableServiceInterface
{

    /**
     * @param int $id
     * @param array $configData
     * @return mixed
     */
    public function editConfig(string $id,array $configData);

    /**
     * @param int $id
     * @return mixed
     */
    public function delConfig(int $id);

    /**
     * @return mixed
     */
    public function listConfig();

}