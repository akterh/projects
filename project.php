
<?php
    include_once("scramblerf.php");
    $task = 'encode';
    if(isset($_GET['task']) && $_GET['task'] != ''){
        $task = $_GET['task'];
        //$mode = $_GET['mode'] ?? 'encode';   

    }   

    
    
    $key = "abcdefghijklmnopqrstuvwxyz0123456789";
    if ('key'== $task){
        $key_original = str_split($key);
        shuffle($key_original);
        $key = join('',$key_original);
        
        
    }else if(isset($_POST['key']) && $_POST['key']!=''){
        $key = $_POST['key'];
    }

    $scrambledData ='';
    if('encode' == $task){
        $data = $_POST['data'] ?? '';
        if($data != ''){
            $scrambledData = scrambleData($data,$key);
        }
    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>project</title>
</head>
<body>
    <div>
        <div class="row content-align-center">
                <div class=" col-4 " style="margin-left:400px" >
            <h2>Data scrambler</h2>
                <p>use this application to scramble your data</p>
                <P>
                   <a href="/project.php?task=encode">ENCODE</a> |
                   <a href="/project.php?task=decode">DECODE</a> |    
                   <a href="/project.php?task=key">GENERATE KEY</a>    
                </P>
                <form action ="project.php"  method="POST">
                    <div class="form-group">
                        <label for="key">Key</label>
                        <input class="form-control mb-3" type="text" name = "key" id="key" <?php displayKey($key); ?> >
                        <label for="data">Data</label>
                        <textarea style="height:100px" class="form-control mb-3" name="data" id="data" cols="30" rows="10"><?php if(isset($_POST['data'])) {echo $_POST['data'];} ?></textarea>
                        <label for="result">Result</label>
                        <textarea style="height:100px" class="form-control mb-3" name="result" id="result" cols="30" rows="10"><?php echo $scrambledData; ?></textarea>
                        <button class="btn btn-success">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
</body>
</html>