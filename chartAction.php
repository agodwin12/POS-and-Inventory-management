<?php

$conn = new PDO("mysql:host=localhost;dbname=favourite", "root", "");
if (isset($_POST["action"])){
    if ($_POST["action"] == 'fetch'){
        $order_column= array('agent', 'product','quantity');

        $main_query= "SELECT agent, SUM(quantity) AS product, quantity FROM sales";

        $search_query = '';

        if (isset($_POST["search"]["value"])){
            $search_query .='(agent LIKE "%'.$_POST["search"]["value"].'%" OR product LIKE "%'.$_POST["search"]["value"].'%"
            OR quantity LIKE "%'.$_POST["search"]["value"].'%")';

        }
        $group_by_query = "GROUP BY quantity";

        $order_by_query = "";

        if (isset($_POST["order"])){
            $order_by_query = 'ODER BY'.$order_column[$_POST['order']['0']['column']].''.$_POST['order']['0']['dir'].'';

        }else{
            $order_by_query = 'ORDER BY quantity DESC';
        }
        $limit_query = '';
        if ($_POST["length"] != -1){
            $limit_query = 'LIMIT'.$_POST['start'].','.$_POST['length'];

        }
        $statement = $conn->prepare($main_query . $search_query . $group_by_query . $order_by_query);

        $statement->execute();
        $filtered_rows = $statement->rowCount();
        $statement = $conn->prepare($main_query.$group_by_query);
        $statement->execute();
        $total_rows = $statement->rowCount();
        $result = $conn->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);

        $date = array();

        foreach ($result as $row){
            $sub_array = array();
            $sub_array[]= $row['agent'];
            $sub_array[]=$row['product'];
            $sub_array[]= $row['quantity'];

            $data = $sub_array;

        }

        $output = array(
          "draw" => intval($_POST["draw"]),
            "recordsTotal" => $total_rows,
            "recordsFiltered" =>$filtered_rows,
            "data" => $data

        );

        echo Json_encode($output);

    }
}

?>
