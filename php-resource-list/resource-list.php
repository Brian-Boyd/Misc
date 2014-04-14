<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container page-content">
    <div class="row">
        <article class="col-sm-9">
            <div class="directory">
                <div class="group">
                
		<?php
            include 'resources.php';
            
            // new variables
            $prev    = '';
            
            $resource['header']    = rtrim(strtok($data, "|"));
            $resource['subheader'] = rtrim(strtok("|"));
            $resource['name']      = rtrim(strtok("|"));
            $resource['number']    = rtrim(strtok("\n"));
            
            while($resource['header'])
            {
                
                // Unique header code
                if($resource['header'] != $prev) 
                {
                    echo '
                    <div class="row" style="background-color:#CCC" ><div class="col-md-12"><p>' .$resource['header']. '</p></div></div>';
                }						
                $prev =  $resource['header'];
                
                    echo "
                        <div class=\"row\">";
                                                                                                            
                        echo '<div class="col-md-4"><p>' .$resource['subheader']. '</p></div>';
                        echo '<div class="col-md-4"><p>' .$resource['name']. '</p></div>';
                        echo '<div class="col-md-4"><p>' .$resource['number']. '</p></div>';
                        
                    echo "</div>";
                
                $resource['header']    = rtrim(strtok("|"));
                $resource['subheader'] = rtrim(strtok("|"));
                $resource['name']      = rtrim(strtok("|"));
                $resource['number']    = rtrim(strtok("\n"));
            }
        ?>
                            
                </div>
            </div>
        </article>
        <aside class="col-sm-3 sidebar"> </aside>
    </div>
    
</div>
</body>
</html>