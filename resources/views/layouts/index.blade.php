<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@include('layouts.menu')
<body>
    <header>
        @yield('header')
    </header>

    <main>
        @yield('main')
    </main>

    <footer>
        @yield('footer')
         <!-- TinyMCE CDN -->
<script src="https://cdn.tiny.cloud/1/fnt7rf3m280szqykscgc5k1ehrsrk6q9ma7jlftro65sx5ty/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Initialize Editor -->
<script>
  tinymce.init({
    selector: '#editor',  // This is the textarea ID
    plugins: 'lists link image code',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
    height: 400
  });
</script>
 

    </footer>

</body>
</html>
