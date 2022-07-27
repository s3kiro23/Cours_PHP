!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Appel de la Feuille de style minifiée De La librairie Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Appel de la Feuille de style minifiée De l'extension Datepicker -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <title>TestDate</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="form-group">
                <div class="form-group">
                    <div class="datepicker date input-group">
                        <input type="text" placeholder="Choisir une date" class="form-control" id="reservationDate">
                        <div class="input-group-append"><span class="input-group-text px-4"><i
                                        class="fa fa-calendar"></i></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Extension jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Extension DATEPICKER -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Noyau JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/9414e04596.js" crossorigin="anonymous"></script>
<!-- Script pour activation du datepicker -->
<script src="../public/js/script.js"></script>
</body>
</html>