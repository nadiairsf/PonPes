<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Ajax Autocomplete Dynamic Search with select2</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <style>
        h2 {
            color: white;
        }
    </style>
</head>

<body class="bg-primary">
    <div class="container mt-5">
        <div class="row">
            
            <div class="col-md-8 mt-5 offset-2">
                <select class="livesearch form-control p-3" name="livesearch"></select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-5 offset-2">
                <a href="/admin/login">  <button>Login Admin</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-5 offset-2">
                <a href="/guru/login">  <button>Login Guru</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-5 offset-2">
                <a href="/santri/login">  <button>Login Santri</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-5 offset-2">
                <a href="/wali/login">  <button>Login Wali</button></a>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Select movie',
        ajax: {
            url: '/admin/diary/ajax-autocomplete-search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nama,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
</html>