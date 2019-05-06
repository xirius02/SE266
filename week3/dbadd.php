<?php

include_once __DIR__ . '/dbconnect.php';
function getAllTestData(){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM corps");
     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}
function wholebaseschools()
{
    
    $db = getDatabase();
            $stmt = $db->prepare("SELECT * FROM schools");
        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}
function wholebase()
{
    
    $db = getDatabase();
            $stmt = $db->prepare("SELECT * FROM corps");
        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}
function getSearchData($column, $searchWord){
    $db = getDatabase();
           
    /*$stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY ");
    $search = '%'.$searchWord.'%';
            $binds = array(
                ":search" => $search
            );
     $results = array();
     if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }*/
     if(!isset($_GET['dataone']))
        {
            $stmt = $db->prepare("SELECT * FROM corps");
        /*
         * We execute the statement and make sure we
         * got some results back.
         */
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
            //echo $_GET['asc'];
            //echo $_GET['datatwo'];
            if($_GET['datatwo'] == 'owner')
            {
                $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search ORDER BY $owner $order");
                $search = '%'.$searchWord.'%';
                $binds = array
                (
                     ":search" => $search
                );
                $results = array();
                if ($stmt->execute($binds) && $stmt->rowCount() < 0)
                {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                if ($stmt->rowCount() == 0) 
                {
                    echo 'Nothing Found, Try Again';
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
                
                if ($stmt->rowCount() == 0) 
                {
                    echo 'Nothing Found, Try Again';
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
                
                if ($stmt->rowCount() == 0) 
                {
                    echo 'Nothing Found, Try Again';
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
                                
                if ($stmt->rowCount() == 0) 
                {
                    echo 'Nothing Found, Try Again';
                }
            }
                
        }
    }//end if
     
    return $results;
}
function getColumns () {
    $columns = ["email", "phone", "zipcode", "owner"];
    
    return ($columns);
}
function getSortedData() {
    
}
function searchTest($column, $search){
    
}
