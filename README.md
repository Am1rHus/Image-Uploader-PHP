
# PHP code to upload Images to server side

## Install 

To run this code just you need to create a folder like so "uploads/img/" also you can change the directory in index file line 26.

If you want to use my code in your HTML
you have to add bellow Argument to Form element in Index.php in order to run the code properly 
``` HTML
enctype="multipart/form-data"
```

### You can change this lines :

Select folder target to upload image - Line 26 - index.php
``` PHP
$target_dir = "uploads/img/";
```
You can change maximum file size from this line of codes - Line 51 - index.php
``` PHP
if ($_FILES["fileupload"]["size"] > 1000000) //change this number for maximum file size
```
You can specify formats that are allowed to upload via this codes - Line 57 - index.php
``` PHP
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "tiff" && $imageFileType != "gif")
```
In this peace of code you can see the file name will change to Date followed by a random number from 100 to 999 after upload, you can change the code to use UUID or whatever that is best for you - Line 79 - index.php
``` PHP
$oldname=$target_file;
$newname="uploads/img/".date("y_m_d_").rand(100,999)."." . $imageFileType;
rename($oldname,$newname);
```


