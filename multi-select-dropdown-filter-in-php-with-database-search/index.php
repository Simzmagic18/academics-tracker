<?php
include 'DBController.php';
$db_handle = new DBController();
$countryResult = $db_handle->runQuery("SELECT DISTINCT user_type FROM teacher ORDER BY user_type ASC");
?>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet" />
<title>Multiselect Dropdown Filter</title>
</head>
<body>
    <h2>Multiselect Dropdown Filter</h2>
    <form method="POST" name="search" action="index.php">
        <div id="demo-grid">
            <div class="search-box">
                <select id="Place" name="user_type[]" multiple="multiple">
                    <option value="0" selected="selected">Select Country</option>
                        <?php
                        if (! empty($countryResult)) {
                            foreach ($countryResult as $key => $value) {
                                echo '<option value="' . $countryResult[$key]['user_type'] . '">' . $countryResult[$key]['user_type'] . '</option>';
                            }
                        }
                        ?>
                </select><br> <br>
                <button id="Filter">Search</button>
            </div>
            
                <?php
                if (! empty($_POST['user_type'])) {
                    ?>
                    <table cellpadding="10" cellspacing="1">

                <thead>
                    <tr>
                        <th><strong>ID</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Role</strong></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * from teacher";
                    $i = 0;
                    $selectedOptionCount = count($_POST['user_type']);
                    $selectedOption = "";
                    while ($i < $selectedOptionCount) {
                        $selectedOption = $selectedOption . "'" . $_POST['user_type'][$i] . "'";
                        if ($i < $selectedOptionCount - 1) {
                            $selectedOption = $selectedOption . ", ";
                        }
                        
                        $i ++;
                    }
                    $query = $query . " WHERE user_type in (" . $selectedOption . ")";
                    
                    $result = $db_handle->runQuery($query);
                }
                if (! empty($result)) {
                    foreach ($result as $key => $value) {
                        ?>
                <tr>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['teacher_id']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['teacher_first_name']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['user_type']; ?> </div></td>
                    </tr>
                <?php
                    }
                    ?>
                    
                </tbody>
            </table>
            <?php
                }
                ?>  
        </div>
    </form>
</body>
</html>