<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <style>
            #preview img{
                width: 250px;
            }
        </style>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Галерея</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="create.php">Создать</a>
                    </li>
            </div>
        </div>
    </nav>
    <main class="container">
        <form enctype="multipart/form-data" method="post" action="post-db.php">
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" required name="title">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" required name="image">
            </div>
            <div id="preview"></div>
            <button type="submit" class="btn btn-primary">Выложить</button>
        </form>
        <script>
            const imageInput = document.getElementById('image');
            const preview = document.getElementById('preview');

            function Preview(files) {
                preview.innerHTML = '';
                const file = files[0];
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            }

            imageInput.addEventListener('change', (e) => {
                Preview(e.target.files);
            });

            imageInput.addEventListener('drop', (e) => {
                e.preventDefault();
                const files = e.dataTransfer.files;
                imageInput.files = files;
                Preview(files);
            });
        </script>
</body>

</html>