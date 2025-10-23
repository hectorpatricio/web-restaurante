<?php

unset($_SESSION['timestamp']);

$mesas = [
    ['numero' => 1, 'estado' => 'desocupado'],
    ['numero' => 2, 'estado' => 'ocupado'],
    ['numero' => 3, 'estado' => 'limpieza'],
    ['numero' => 4, 'estado' => 'desocupado'],
    ['numero' => 5, 'estado' => 'ocupado'],
    ['numero' => 6, 'estado' => 'desocupado'],
    ['numero' => 7, 'estado' => 'desocupado'],
    ['numero' => 8, 'estado' => 'desocupado'],
    ['numero' => 9, 'estado' => 'limpieza'],
    ['numero' => 10, 'estado' => 'desocupado'],
    ['numero' => 11, 'estado' => 'ocupado'],
    ['numero' => 12, 'estado' => 'desocupado'],
    ['numero' => 13, 'estado' => 'limpieza']
];
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />


<section class="py-5 mt-4">
    <div class="container"> 
        <h3>
            <i class="fas fa-utensils"></i> Mesas
        </h3>
        <div class="container mt-4">
            <div class="row">
                <?php
                    for ($i = 0; $i < count($mesas); $i++) 
                    { 
                        $mesa = $mesas[$i]; // más claro
                        $estado = $mesa['estado'];
                        $numero = $mesa['numero'];

                        if ($estado == 'desocupado')
                        {
                            ?>
                                <a href="index.php?ruta=entrada&mesa=<?= $i + 1?>">
                                    <button class="mesa available">
                                        <i class="material-symbols-outlined" style="font-size: 48px; color: white;">dine_lamp</i>
                                        <div class="label">Mesa <?= $i + 1?></div>
                                        <div>Disponible</div>
                                    </button>
                                </a>
                            <?php
                        }
                        else if ($estado == 'limpieza')
                        {
                            ?>
                                <a href="index.php?ruta=entrada&mesa=<?= $i + 1?>">
                                    <button class="mesaLimpiar available">
                                        <i class="material-icons" style="font-size: 48px; color: white;">no_meals</i>
                                        <div class="label">Mesa <?= $i + 1?></div>
                                        <div>Limpieza</div>
                                    </button>
                                </a>
                            <?php
                        }
                        else if ($estado == 'ocupado')
                        {
                            ?>
                                <a href="index.php?ruta=entrada&mesa=<?= $i + 1?>">
                                    <button class="mesaOcup available">
                                        <i class="material-symbols-outlined" style="font-size: 48px; color: white;">restaurant</i>
                                        <div class="label">Mesa <?= $i + 1?></div>
                                        <div>Ocupado</div>
                                    </button>
                                </a>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<style>
    :root{
    --w: 240px;
    --h: 130px;
    --radius: 14px;
    --gap: 20px;
    --shadow: 0 8px 20px rgba(0,0,0,.08);
    --bg: #f5f6f7;
    /* --green: #31b06a; */
    --green: #44755bff;
    --red: #f15b5b;
    --yellow: #f6c24f;
    --gray: #9ea3a8;
    }
    *{box-sizing:border-box}
    body{
    font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    background: var(--bg);
    padding: 36px;
    color: #111;
    }
    h1{font-weight:700;margin-bottom:20px}

    .salon{
    display: grid;
    grid-template-columns: repeat(3, var(--w));
    gap: var(--gap);
    justify-content: center;
    align-items: center;
    }

    /* Mesa que se encuentra Disponible: */
    .mesa {
        width: 180px;
        height: 120px;
        margin: 10px; /* separación entre botones */
        border-radius: 12px;
        background-color: #4caf50;
        color: white;
        font-weight: bold;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .mesa:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 10px rgba(0,0,0,0.3);
    }

    /* Label sizes */
    .label{ font-size: 20px; line-height:1; }
    .small{ font-size:12px; font-weight:600; margin-top:6px; opacity:.95 }

    /* States (gradients para pulido visual) */
    .mesa.available{ background: linear-gradient(180deg,var(--green), #2fa55f); }
    .mesa.occupied{ background: linear-gradient(180deg,var(--red), #e14d4d); }
    .mesa.reserved{ background: linear-gradient(180deg,var(--yellow), #e8b73a); color: #222; }
    .mesa.out{ background: linear-gradient(180deg,var(--gray), #8f9396); }

    /* Responsive */
    @media (max-width:900px){
    .salon{ grid-template-columns: repeat(2, 1fr); }
    .mesa{ width: calc(50vw - 40px); }
    }

    button {
        background-color: transparent; /* fondo transparente */
        background-image: url('../../imagen/panel/panel-mesa.jpg');
        background-size: cover;
        background-position: center;
        width: 180px;
        height: 180px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        color: black;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        padding: 0;
    }

    /* ------------------------------------------------------------------------------------------ */
    /* Mesa que se encuentra Ocupada: */
    .mesaOcup {
        width: 180px;
        height: 120px;
        margin: 10px; /* separación entre botones */
        border-radius: 12px;
        background-color: #a2af4cff;
        color: white;
        font-weight: bold;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    /* States (gradients para pulido visual) */
    .mesaOcup.available{ background: linear-gradient(180deg,var(--green), #b6cb3cff); }
    .mesaOcup.occupied{ background: linear-gradient(180deg,var(--red), #e14d4d); }
    .mesaOcup.reserved{ background: linear-gradient(180deg,var(--yellow), #e62828ff); color: #222; }
    .mesaOcup.out{ background: linear-gradient(180deg,var(--gray), #8f9396); }
    
    .mesaOcup:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 10px rgba(0,0,0,0.3);
    }

    /* Responsive */
    @media (max-width:900px){
    .salon{ grid-template-columns: repeat(2, 1fr); }
    .mesaOcup{ width: calc(50vw - 40px); }
    }

    /* ------------------------------------------------------------------------------------------ */
    /* Mesa que se encuentra para limpiar: */
    .mesaLimpiar {
        width: 180px;
        height: 120px;
        margin: 10px; /* separación entre botones */
        border-radius: 12px;
        background-color: #4caf50;
        color: white;
        font-weight: bold;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    /* States (gradients para pulido visual) */
    .mesaLimpiar.available{ background: linear-gradient(180deg,var(--green), #ed1919ff); }
    .mesaLimpiar.occupied{ background: linear-gradient(180deg,var(--red), #e14d4d); }
    .mesaLimpiar.reserved{ background: linear-gradient(180deg,var(--yellow), #e8b73a); color: #222; }
    .mesaLimpiar.out{ background: linear-gradient(180deg,var(--gray), #8f9396); }
    
    .mesaLimpiar:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 10px rgba(0,0,0,0.3);
    }

    /* Responsive */
    @media (max-width:900px){
    .salon{ grid-template-columns: repeat(2, 1fr); }
    .mesaLimpiar{ width: calc(50vw - 40px); }
    }
</style>