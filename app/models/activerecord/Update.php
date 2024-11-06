<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;
use app\models\connection\Connection;;
use Exception;
use Throwable;

class Update implements ActiveRecordExecuteInterface
{
    public function __construct(private string $field, private string $value)
    {
        
    }

    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
        try {

            $query = $this->createQuery($activeRecordInterface);
            
            $connection = Connection::connect();

            $attributes = array_merge($activeRecordInterface->getAttributes(), [
                $this->field => $this->value
            ]);

            $prepare = $connection->prepare($query);
            $prepare->execute($attributes);

            return $prepare->rowCount();

        } catch (Throwable $throw) {
           formatException($throw);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        
        if (array_key_exists('id', $activeRecordInterface->getAttributes())){
            throw new Exception('Não é necessário informar o id.');
        }
        
        $sql = "update {$activeRecordInterface->getTable()} set ";

        foreach ($activeRecordInterface->getAttributes() as $key => $value) {
            $sql .= "{$key}=:{$key},";
        }

        $sql = rtrim($sql, ',');
        $sql .= " where {$this->field} = :{$this->field}";

        return $sql;
    }
}