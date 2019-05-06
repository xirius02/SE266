<?php
/**
 * Function to establish a database connection
 * 
 * @return PDO Object
 */  

function getDatabase() {
    
        /* PHP script runs local or remote. Database server remote */
        /* 
            *********************************************************************************
            BE SURE TO CHANGE THIS TO USE YOUR OWN dbname, user name and password! 
                
                dbname: se266_[firstname]
                DB_USER:  se266_[firstname]
	            DB_PASSWORD: studentidwithoutleadingzeroes
            	
           *********************************************************************************    
        */
    $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_008003477',
            'DB_USER' => 'se266_008003477',
            'DB_PASSWORD' => '008003477'
        );
        
        
         /* PHP script runs local. Database Server local */
       /*
        $config = array(
            'DB_DNS' => 'mysql:host=192.168.10.10;port=3306;dbname=se266_erik;',
            'DB_USER' => 'homestead',
            'DB_PASSWORD' => 'secret'
        );
        */
        /* Create a Database connection and save it into the variable */
        
        try {
            $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $db = null;
        }
        
    return $db;
}

/*function getsearch($column, $searchWord)
{
    $db = getDatabase();
    
    if(!isset($_GET['dataone']))
        {
            $stmt = $db->prepare("SELECT * FROM corps");
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
            
        }
        else
        {
        $searchWord = $_GET['dataone'];
        $column = 'zipcode';
        $owner = $_GET['datatwo'];
        $order = 'ASC'; //DESC
        $order2 = 'DESC'; //DESC
        
        if($_GET['asc'] == 'ascending')
        {
            if($_GET['datatwo'] == 'owner')
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $owner $order");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                     ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() > 0)
                {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            }
            else
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $column $order");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                     ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() > 0)
                {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                
            }
                
        }
        if($_GET['asc'] == 'descending')
        {
            if($_GET['datatwo'] == 'owner')
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $owner $order2");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                        ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                {
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            }
            else
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $column $order2");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                        ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                {
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            }
                
        }
        
        
        
        }//end if
    
}*/

?>