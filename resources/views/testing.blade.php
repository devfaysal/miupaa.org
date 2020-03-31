<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" id="image" accept="image/*" name="image" capture="camera">
        <input type="submit" value="Upload">
    </form>

    <h1>Image</h1>
    <img id="imageView" style="max-width: 200px;" src="{{asset('/storage/'. $imageName)}}" alt="">

    <script>
        input = document.querySelector('#image');
        
        input.addEventListener('change', function(){
            preview = document.querySelector('#imageView');
            file    = input.files[0];
            reader  = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        });
    </script>
</body>
</html>