<?php
    require_once "config.php";

    class Model
    {
        private static $connect = false;

        public function __construct()
        {
            self::dbConnect();
            try {
                if(!self::$connect) {
                    throw new Exception('Ошибка подключения');
                }
            }
            catch(Exception $e) {
                error_log($e->getMessage());
            }
        } 

        public static function dbConnect() {
            $host 	  = Config::PG_DB_HOST;
            $dbname   = Config::PG_DB_NAME;
            $user 	  = Config::PG_DB_LOGIN;
            $password = Config::PG_DB_PASSWORD;
    
            if(!self::$connect) {
                self::$connect = pg_connect("host=$host dbname=$dbname user=$user password=$password");
            }
        }

        public function update($entity_type, $entity, $labels)
        {
            $this->entity_exist($entity, $entity_type);
            $this->label_available($labels);

            $sql = "DELETE FROM entity_labels WHERE entity_fk = $1";
            if(pg_query_params($sql, [$entity]))
            {
                if(!empty($labels))
                {
                    foreach($labels as $label)
                    {
                        $sql = pg_query_params(
                            "INSERT INTO entity_labels (label_name, entity_fk) VALUES ($1, $2)",
                            [$label, $entity]
                        ); 
                    }
                }
                
                return true;
            }
            throw new Exception('Неудалось очистить данные'); 
        }

        public function add($entity_type, $entity, $labels)
        {
            if(empty($labels))
            {
                throw new Exception('Список лэйблов пуст'); 
            }
            $this->entity_exist($entity, $entity_type);
            $this->label_available($labels);

            foreach($labels as $label)
            {
                $sql = pg_query_params(
                    "INSERT INTO entity_labels (label_name, entity_fk) VALUES ($1, $2)",
                    [$label, $entity]
                );
            }
            
            return true;
        }

        public function get($entity_type, $entity)
        {
            $this->entity_exist($entity, $entity_type);
            
            $sql = pg_query_params(
                "SELECT id, label_name FROM entity_labels WHERE entity_fk = $1",
                [$entity]
            );

            $labels = pg_fetch_all($sql);
            if(!$labels)
            {
                throw new Exception('Лэйблы не найдены');
            }
            return $labels;
        }

        public function delete($entity_type, $entity, $labels)
        {
            if(empty($labels))
            {
                throw new Exception('Список лэйблов пуст'); 
            }
            $this->entity_exist($entity, $entity_type);
            $this->label_exist($labels, $entity);

            foreach($labels as $label)
            {
                $sql = pg_query_params(
                    "DELETE FROM entity_labels WHERE label_name = $1 AND entity_fk = $2",
                    [$label, $entity]
                );
            }
            return true;
        }

        private function type_check($entity_type)
        {
            $sql = pg_query_params(
                "SELECT id FROM entity_types WHERE id = $1",
                [$entity_type]
            );
            $res = pg_fetch_assoc($sql);
            if($res)
            {
                return true;
            }
            throw new Exception('Тип сущности не найден');
        }

        private function label_available($labels)
        {
            foreach($labels as $label)
            {
                $sql = pg_query_params(
                    "SELECT id FROM available_labels WHERE label_name = $1",
                    [$label]
                );
                
                $res = pg_fetch_assoc($sql);

                if(!$res)
                {
                    throw new Exception('Лэйбл: '.$label.' недопустим!');
                }
            }
            
            return true;
        }

        private function label_exist($labels, $entity)
        {
            foreach($labels as $label)
            {
                $sql = pg_query_params(
                    "SELECT id FROM entity_labels WHERE label_name = $1 AND entity_fk = $2",
                    [$label, $entity]
                );
                
                $res = pg_fetch_assoc($sql);

                if(!$res)
                {
                    throw new Exception('Лэйбл: '.$label.' недопустим!');
                }
            }
            
            return true;
        }

        private function entity_exist($entity, $entity_type)
        {
            $sql = pg_query_params(
                "SELECT id FROM entityes WHERE id = $1 AND entity_type = $2",
                [$entity, $entity_type]
            );
            $res = pg_fetch_assoc($sql);
            if($res)
            {
                return true;
            }
            throw new Exception('Сущность не найдена!');
        }
    }