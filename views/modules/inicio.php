<section class="py-5 mt-4">
    <div class="container"> 
        <h3>
            <i class="fas fa-utensils"></i> Mesas
        </h3>
        <div class="container mt-4">
            <div class="row">
                <?php
                    for ($i = 0; $i <= 17; $i++) 
                    { 
                        ?>
                            <div class="col-2 mt-3">
                                <a href="index.php?ruta=entrada&mesa=<?= $i + 1 ?>">
                                    <button style="
                                        background-image: url('../../imagen/panel/panel-mesa.jpg'); 
                                        background-size: cover;
                                        background-position: center;
                                        width: 180px; 
                                        height: 180px; 
                                        border: none;
                                        border-radius: 8px;
                                        cursor: pointer;
                                        position: relative;
                                        font-size: 16px; 
                                        font-weight: bold;
                                        color: white; 
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: flex-end;
                                        align-items: center;
                                        padding: 0;">
                                    </button>
                                </a>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>
