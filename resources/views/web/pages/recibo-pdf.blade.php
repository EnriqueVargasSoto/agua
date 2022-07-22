<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <div style="width: 100%">
        <div class="row">
            <img src="web/images/logo.png" alt="">
        </div>
        <div class="row">
            <strong>Nro. Suministro : {{$numeroSuministro}}</strong><br>
            <strong>Nombres : {{$nombres}}</strong><br>
            <strong>Emitido el {{$emitido}}</strong>
        </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
</body>
</html>