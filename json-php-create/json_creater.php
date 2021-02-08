<?php
		//ini_set('display_errors',0);
if(isset($_POST['submit'])){
   $myFile = "old/data.json";

   $newFile = "New File.json";

   $arr_data = array(); // create empty array

  try{
	   $formdata=$formdata1 = array(
	      'question'=> $_POST['question'],
          "a"=> $_POST['option1'],
          "b"=> $_POST['option2'],
          "c"=> $_POST['option3'],
          "d"=> $_POST['option4'],
	      'answer'=> $_POST['answer']
	   );
	if(file_exists($newFile)){
	   $jsondata = file_get_contents($newFile);
	   $arr_data = json_decode($jsondata, true);
		array_push($arr_data,$formdata);
	}else{
		$jsondata = file_get_contents($myFile);
		$arr_data = json_decode($jsondata, true);
		array_push($formdata,$arr_data);
		array_pop($arr_data);
		array_push($arr_data,$formdata1);
	}

	   $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
	
	if(file_put_contents($newFile, $jsondata)) {
	        echo 'Data successfully saved';
	    }
	   else 
	        echo "error";

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
	input[type=text] {
   width: 400px;
}</style>
</head>
<body>
<form action="json_creater.php" method="POST">
	<textarea name="question" cols="60" rows="12"></textarea>
	<br><br>
	a:
	<input type="text" name="option1">
	<br><br>
    b:
	<input type="text" name="option2">
	<br><br>
    c:
	<input type="text" name="option3">
	<br><br>
    d:
	<input type="text" name="option4">
	<br><br>
	->
	<input type="text" name="answer">
	<br><br>
	<input type="submit" name="submit" value="Submit">
</form>
    
</body>
</html>