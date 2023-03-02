<!DOCTYPE html>
<html lang="en">
<head>
<?php
error_reporting(0);
ob_start();
?>
  <meta charset="UTF-8">
  <title>Upload Image PHP - Am1rHus</title>
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
<!-- partial:index.html -->
<div class="login-page">
  <div class="form">
    <form action="" method="post" class="login-form" enctype="multipart/form-data">
      <input type="file" name="fileupload" accept=".png, .jpg, .jpeg">
      <input type="submit" name="submit" class="submitupload">
    </form>
  </div>
</div>
<center>
<?php
// select folder target to upload image
$target_dir = "uploads/img/";
// select folder target to upload image and image name
$target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
// create variable for success upload image
$uploadOk = 1;
// get file type in imagefiletype
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  
  $check = getimagesize($_FILES["fileupload"]["tmp_name"]);

  if($check !== false) {

    echo "File is an <b>image</b> - " . $check["mime"] . ". <br> ";

    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileupload"]["size"] > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "tiff" && $imageFileType != "gif") {
      echo "Sorry, only JPG, JPEG, PNG, TIFF & GIF files are allowed.";
      $uploadOk = 0;
    }


  } else {

    echo "File is not an image.";

    $uploadOk = 0;

  }
  
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
    $oldname=$target_file;
    $newname="uploads/img/".date("y_m_d_").rand(100,999)."." . $imageFileType;
    rename($oldname,$newname);
    echo "The file <b>". htmlspecialchars( basename($newname)). "</b> has been<b> uploaded</b>.";
  } else {
    if($_POST["submit"])
    {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>
<p>Code By <a href="https://am1rhus.github.io/">Am1rHus</a></p>
</center>
</body>
</html>
