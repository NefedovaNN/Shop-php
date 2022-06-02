<?php

namespace app\models;

use app\engine\App;
use app\interfaces\IRepository;


abstract class Repository implements IRepository
{

    protected abstract function getTableName();
    protected abstract function getEntityClass();
    public function getWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryOneObj($sql, ['value' => $value], $this->getEntityClass());
    }
    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }
    public function getSum($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT SUM(products.price) as sum FROM {$tableName}, `products` WHERE {$name} = :value AND {$tableName}.product_id = products.id";
        return App::call()->db->queryOne($sql, ['value' => $value])['sum'];
    }


    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        // return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return App::call()->db->queryOneObj($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }
    public function getAllOrderById()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY `id` DESC";
        return App::call()->db->queryAll($sql);   
    }

    public function insert(Model $entity)
    {
        $params = [];
        $columns = [];
        foreach ($entity->props as $key => $value) {
            $params[$key] = $entity->$key;
            $values[] = ':' . $key;
        }
        $columns = implode(', ', array_keys($params));
        $values = implode(', ', $values);
        $tableName = $this->getTableName();
        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$values})";
        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
        return $this;
    }
    public function update(Model $entity)
    {
        //TODO сделать update в идеале оптимальный, формировать set только по изменившимся полям
        $tableName = $this->getTableName();
        $data = [];

        foreach ($entity->props as $key => $value) {
            if(!$value) continue;
                $data[] = "`{$key}` = :{$key}";
                $params["{$key}"] = $entity->$key;
                // $entity->props[$key] = false;
            
        }

        $data = implode(', ', $data);
        $params['id'] = $entity->id;
       
        $sql = "UPDATE `{$tableName}` SET {$data} WHERE `id` = :id";
       App::call()->db->execute($sql, $params);
       return $this;
    }

    public function save(Model $entity)
    {
        //TODO реализовать умный save
        
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
    public function delete(Model $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
    }
    public function getLimit($limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return App::call()->db->queryLimit($sql, $limit);
    }
}
