<?php
$bicicletasArray = array("Carrera", "Touring", "Ciclo", "Montaña", "Electrica", "Urbana");
$ciudadesArray = array("Córdoba", "Sevilla", "Malaga", "Granada", "Almeria");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    img {
      animation: zoom 5s infinite alternate ease-in-out;
      height: 100%!important;
      filter: sepia(50%);
      filter: brightness(50%);
    }

    @keyframes zoom {
      from {
        scale: 1.2;
      }

      to {
        scale: 1;
      }
    }

    select {
      width: 250px;
      color: rgb(0, 0, 0, .6) !important;
      font-size: 20px !important;
      padding: 10px 20px !important;
      border: 1px solid rgb(0, 0, 0, .6) !important;
    }
  </style>
</head>

<body>
  <header class="relative flex justify-center h-screen items-center">
    <div class="-z-10 top-0 absolute w-full h-screen max-h-screen overflow-hidden">
      <img class="object-cover w-full h-full"
        src="https://wallpapercrafter.com/desktop/211654-bike-bicycle-basket-and-street-hd.jpg" />
    </div>
    <div class="grid gap-5">
      <span class="text-white ">
        <h1 class="text-6xl font-bold font-serif">Alquila la bici que quieras</h1>
        <h3 class="text-4xl font-bold font-serif">Con seguro a todo riesgo incluido</h3>
      </span>
      <form method="POST" action="./verReservas.php" class="grid justify-center gap-3" onsubmit="return validarFormulario()">

        <div class="flex gap-6">
          <select class="rounded-md" name="tipo_bicicleta" id="tipo_bicicleta">
            <option disabled selected value="">¿Qué bicicleta buscas?</option>
            <?php
            for ($i = 0; $i < count($bicicletasArray); $i++) {
              echo '<option value="' . $bicicletasArray[$i] . '">' . $bicicletasArray[$i] . '</option>';
            }
            ?>
          </select>

          <select class="rounded-md" name="ciudad" id="ciudad">
            <option disabled selected value="">¿Dónde la quieres?</option>
            <?php
            for ($i = 0; $i < count($ciudadesArray); $i++) {
              echo '<option value="' . $ciudadesArray[$i] . '">' . $ciudadesArray[$i] . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none  dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-white  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-white  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
          </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_telephone" id="floating_telephone" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
          <label for="floating_telephone" class="peer-focus:font-medium absolute text-sm text-white  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (123-456-7890)</label>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-5 group">
            <input type="date" name="floating_date_reserva" id="floating_date_reserva" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_date_reserva" class="peer-focus:font-medium absolute text-sm text-white  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <input type="date" name="floating_date_vencimiento" id="floating_date_vencimiento" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_date_vencimiento" class="peer-focus:font-medium absolute text-sm text-white  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
          </div>
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
          ¡A RODAR!
        </button>
      </form>
      <div class="flex justify-center mt-5">
        <span class="text-red-800 font-mono hidden bg-red-400 px-2 py-3 rounded-lg text-center w-fit" id="log"></span>
      </div>
    </div>
  </header>

</body>

</html>
<script>

  let reservaInput = document.getElementById('floating_date_reserva');
  reservaInput.value = new Date().toISOString().split('T')[0];

  function validarFormulario() {
    const tipoBicicleta = document.getElementById('tipo_bicicleta').value;
    const ciudad = document.getElementById('ciudad').value;

    if (tipoBicicleta === '' || ciudad === '') {
      log = document.getElementById('log');
      log.classList.toggle('hidden');
      log.innerHTML = 'Por favor, completa todos los campos.';
      return false; // Evita el envío del formulario
    }

    return true; // Permite el envío del formulario
  }
</script>