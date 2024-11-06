<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;
use app\models\connection\Connection;
use Exception;
use Throwable;

class Delete implements ActiveRecordExecuteInterface
{
    public function __construct(private string $field, private string|int $value)
    {
        
    }

    public function execute(ActiveRecordInterface $activeRecordInterface){
        try {
            $query = $this->createQuery($activeRecordInterface);

            $connection = Connection::connect();
            
            $prepare = $connection->prepare($query);
            $prepare->execute([
                $this->field => $this->value
            ]);

            return 'Linhas afetadas '. $prepare->rowCount();
        } catch (Throwable $throw) {
            formatException($throw);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        if ($activeRecordInterface->getAttributes()) {
            throw new Exception('Não é necessário informar atributos para deletar.');
        } 

        $sql = "delete from {$activeRecordInterface->getTable()}";
        $sql .= " where {$this->field} = :{$this->field}";

        return $sql;
    }
}