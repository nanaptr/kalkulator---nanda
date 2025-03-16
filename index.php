<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Kalkulator</title>
</head>
<body class="d-flex vh-100 justify-content-center align-items-center bg-light">

<div class="w-100 h-100 d-flex flex-column align-items-center">
    <h2 class="text-center mt-4">Kalkulator</h2>
    <div class="card shadow p-4" style="width: 50rem; background-color: #f2efed;">
    <form method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="number1">Angka Pertama*</label>  
                <input type="number" name="number1" class="form-control" placeholder="Silahkan Masukan Angka " required />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="number2">Angka Kedua*</label>  
                <input type="number" name="number2" class="form-control" placeholder="Silahkan Masukan Angka " required />
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Pilih operator Aritmatika*</label>    
            <select name="operation" class="form-control">
                <option value="operator">--Pilih Operator--</option>
                <option value="+">Tambah</option>
                <option value="-">Kurang</option>
                <option value="*">Kali</option>
                <option value="/">Bagi</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100" style="background-color: #09ba26;">
            Cek Hasil
        </button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = floatval($_POST['number1']);
            $num2 = floatval($_POST['number2']);
            $operation = $_POST['operation'];
            $result = 0;

            switch ($operation) {
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Tidak dapat membagi dengan nol!</div>";
                    }
                    break;
                default:
                    echo "<div class='alert alert-warning mt-3'>Silakan pilih operator yang valid!</div>";
                    break;
            }

            if ($result !== 0) {
                echo "<div class='alert alert-success mt-3'>Hasil: {$_POST['number1']} {$_POST['operation']} {$_POST['number2']} = $result </div>";
            }
        }
    ?>
    </div>
</div>

</body>
</html>
