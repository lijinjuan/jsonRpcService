<?php

namespace App\JsonRpc;

use Hyperf\Di\Annotation\Inject;
use Hyperf\Memory\TableManager;
use Hyperf\RpcServer\Annotation\RpcService;


#[RpcService(name:"TableService",protocol:"jsonrpc-http", server:"jsonrpc-http")]
class TableService implements TableServiceInterface
{
    #[Inject]
    protected TableManager $tableManager;


    public function editConfig(string $id, array $configData)
    {
        // TODO: Implement editConfig() method.
        $config = $this->tableManager::get('system-config');
        $res = $config->set($id, $configData);
        return $res;
    }

    public function delConfig(int $id)
    {
        // TODO: Implement delConfig() method.
        $config = $this->tableManager::get('system-config');
        $res = $config->del($id);
        return $res;
    }

    public function listConfig()
    {
        // TODO: Implement listConfig() method.
        $config = iterator_to_array(($this->tableManager)::get('system-config'));
        $c = $final_data = [];
        if ($config) {
            array_map(function ($value) use (&$c) {
                return $c[$value['type']][] = $value;
            }, $config);
            $final_data = ['house_type' => $c[1], 'house_style' => $c[2], 'house_acreage' =>$c[3], 'house_budget' => $c[4],'daily_type'=> $c[5]];
        }
        return $final_data;
    }
}