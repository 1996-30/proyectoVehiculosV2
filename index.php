<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Vehiculos</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>

<header>

    <div class="menu container">
        <img class="logo-1" src="images/Logo.png" alt="">
        <input type="checkbox" id="menu" />
        <label for="menu">
            <img src="images/menu.png" class="menu-icono" alt="">
        </label>
        <nav class="navbar">
            <div class="menu-1">
                <ul>
                    <li><a href="formCreateUserCL.php">Registrarse</a></li>
                    <li><a href="inicio.php">Iniciar</a></li>
                </ul>
            </div>
            <img class="logo-2" src="images/Logo.png" alt="">
            <div class="menu-2">
                <ul>
                    <li><a href="#">Horario</a></li>
                </ul>
                <div class="socials">
                    <a href="#">
                        <div class="social">
                            <img src="images/s1.svg" alt="">
                        </div>
                    </a>
                    <a href="#">
                        <div class="social">
                            <img src="images/s2.svg" alt="">
                        </div>
                    </a>
                    <a href="#">
                        <div class="social">
                            <img src="images/s3.svg" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div class="header-content container">
        
        <div class="swiper mySwiper-1">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="slider">
                        <div class="slider-txt">
                            <h1>Familiares</h1>
                            <p>
                                Un coche familiar es un tipo de turismo con una carrocería 
                                de dos volúmenes simples con un portón de acceso al maletero. 
                                Su diseño presenta un habitáculo espacioso y un maletero 
                                más amplio, que permite transportar de manera cómoda a toda 
                                la familia y su equipaje.
                            </p>
                            <div class="botones">
                                <a href="inicio.php" class="btn-1">Alquilar</a>
                                <a href="inicio.php" class="btn-1">Cotizar</a>
                            </div>
                        </div>
                        <div class="slider-img">
                            <img src="images/auto-1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider">
                        <div class="slider-txt">
                            <h1>Económicos</h1>
                            <p>
                                Los autos económicos son vehículos más pequeños que suelen 
                                tener capacidad para cuatro pasajeros . Su alto ahorro de 
                                combustible los hace ideales para conducir en la ciudad, 
                                mientras que su tamaño los hace fáciles de maniobrar en el tráfico.
                            </p>
                            <div class="botones">
                                <a href="#" class="btn-1">Alquilar</a>
                                <a href="#" class="btn-1">Cotizar</a>
                            </div>
                        </div>
                        <div class="slider-img">
                            <img src="images/auto-2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider">
                        <div class="slider-txt">
                            <h1>4 X 4</h1>
                            <p>
                                Vehículos con tracción en las cuatro ruedas, es decir, 
                                vehículos que envían potencia a las cuatro ruedas. 
                                La tracción a las cuatro ruedas suele abreviarse como 4WD o 4X4,
                                por lo que estos términos pueden utilizarse indistintamente.
                            </p>
                            <div class="botones">
                                <a href="#" class="btn-1">Alquilar</a>
                                <a href="#" class="btn-1">Cotizar</a>
                            </div>
                        </div>
                        <div class="slider-img">
                            <img src="images/auto-3.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>                        
        </div>

    </div>        

</header>




    <main class="products">
        <div class="tabs container">
<!-- SEDANES -->
            <input type="radio" name="tabs" id="tab1" checked="checked" class="tabInput" velue="1">
            <label for="tab1">Sedanes</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper1">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/sedan-1.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Mazda 2</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/sedan-2.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Kia Rio</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/sedan-3.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Nissan Versa</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/sedan-4.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Hyundai 2022</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
<!-- CAMIONETAS -->
            <input type="radio" name="tabs" id="tab2" checked="checked" class="tabInput" velue="2">
            <label for="tab2">Camionetas</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper2">        
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/camionetas-1.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Montero Sport</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/camionetas-2.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Outlander</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/camionetas-3.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Honda Pilot</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/camionetas-4.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Toyota RAV4</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/camionetas-5.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Chevrolet</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/camionetas-6.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Blazer</h4>
                                    <p>5 pasajeros</p>
                                    <p>Aire Acondicionado</p>
                                    <p>Mecánico/Automático</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
<!-- PICKUPS -->
            <input type="radio" name="tabs" id="tab3" checked="checked" class="tabInput" velue="3">
            <label for="tab3">Pickups</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper3">        
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/pickups-1.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>L-200</h4>
                                    <p>Mecanico</p>
                                    <p>Turbo Diésel</p>
                                    <p>5 Pasajeros</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/pickups-2.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>RAM 700</h4>
                                    <h4>L-200</h4>
                                    <p>Mecanico</p>
                                    <p>Turbo Diésel</p>
                                    <p>5 Pasajeros</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/pickups-3.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Toyota Hilux</h4>
                                    <p>Mecanico</p>
                                    <p>Turbo Diésel</p>
                                    <p>5 Pasajeros</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/pickups-4.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Nissan NP300</h4>
                                    <p>Mecanico</p>
                                    <p>Turbo Diésel</p>
                                    <p>5 Pasajeros</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/pickups-5.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>JAC Frison T8</h4>
                                    <p>Mecanico</p>
                                    <p>Turbo Diésel</p>
                                    <p>5 Pasajeros</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/pickups-6.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Ford F-150</h4>
                                    <p>Mecanico</p>
                                    <p>Turbo Diésel</p>
                                    <p>5 Pasajeros</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
<!-- MICROBUSES Y MINIVAN -->
            <input type="radio" name="tabs" id="tab4" checked="checked" class="tabInput" velue="4">
            <label for="tab4">Microbuses Y Minivan</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper4">        
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/microbuses-1.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Nissan Urvan</h4>
                                    <p>15 Pasajeros</p>
                                    <p>Turbo Diésel</p>
                                    <p>Mecánico</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/microbuses-2.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Toyota hiace</h4>
                                    <p>15 Pasajeros</p>
                                    <p>Turbo Diésel</p>
                                    <p>Mecánico</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/microbuses-3.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Honda Odisey</h4>
                                    <p>15 Pasajeros</p>
                                    <p>Turbo Diésel</p>
                                    <p>Mecánico</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
<!-- PANELES -->            
            <input type="radio" name="tabs" id="tab5" checked="checked" class="tabInput" velue="5">
            <label for="tab5">Paneles</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper5">        
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/panel-1.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>Nissan VN 200</h4>
                                    <p>2 Pasajeros</p>
                                    <p>Automatica</p>
                                    <p>1 Tonelada</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/panel-2.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>chevrolet N4000</h4>
                                    <p>2 Pasajeros</p>
                                    <p>Automatica</p>
                                    <p>1 Tonelada</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <h4>Nuevo</h4>   
                                    <img src="images/panel-3.png" alt="">                
                                </div>    
                                <div class="product-txt">
                                    <h4>TOYOTA LITEACE</h4>
                                    <p>2 Pasajeros</p>
                                    <p>Automatica</p>
                                    <p>1 Tonelada</p>
                                    <span class="price">$80.00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

<!-- FIN -->                        
        </div>
    </main>

    <section class="info container">
        <div class="info-img">
            <img src="images/AUTOS.png" alt=""> 
        </div>

            <div class="info-txt">
                <h2>Requisitos de alquiles</h2>
                <p>piloto 25 años cumplidos</p>
                <p>Licencia de conducir Vigente>
                <p>Tarjeta de Crédito (Credito de Q6,000.00 Min)</p>
                <a href="#" class="btn-2"> Mas Informacion</a>
            </div>

    </section>

    <section class="horario">
        <div class="horario-info container">

            <h2>Mas Informacion</h2>
            <div class="horario-txt">
                <div class="txt">
                    <h4>Dirección - Sucursales</h4>
                    <p>
                        12 Calle 31-39, Cdad. de Guatemala
                    </p>
                    <p>
                        3ª Avenida 03-48, Zona 13 Pamplona, Cdad. de Guatemala
                    </p>
                    <p>
                        Cdad. de Guatemala
                    </p>
                    <p>
                        Diagonal 14 23-81, Cdad. de Guatemala
                    </p>
                </div>

                <div class="txt">
                    <h4>Horario</h4>
                    <p>
                        De Lunes a Viernes de 8:00 a 18:00 hrs   
                    </p>
                    <p>
                        y sábado de 8:00 a 14:00 hrs
                    </p>
                </div>

                <div class="txt">
                    <h4>Telefono</h4>
                    <p>
                        Oficina :7895-8974
                    </p>
                    <p>
                        Don Wachis: 5848-5055
                    </p>
                </div>

            </div>
        </div>
    </section>
    
    <section>
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!3m2!1ses-419!2sgt!4v1728338543879!5m2!1ses-419!2sgt!6m8!1m7!1stQHpwP9Dx2wulmNusxCHGw!2m2!1d14.63653320585834!2d-90.5624908231046!3f237.9049!4f0!5f0.7820865974627469" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <footer class="footer container">

    <img class="logo-2" src="images/Logo.png" alt="">

        <div class="links">
            <h4>Informacion Adicional</h4>
            <ul>
                <li><a href="">Waza</a></li>
                <li><a href="">Google Maps</a></li>
                <li><a href="">¿Quienes Somos?</a></li>
                <li><a href="">Plan Ciudad</a></li>
            </ul>
        </div>

        <div class="links">
            <h4>Sucursales</h4>
            <ul>
                <li><a href="">Apto internacional La Aurora</a></li>
                <li><a href="">Apto internacional Mundo Maya</a></li>
                <li><a href="">Antigua</a></li>
                <li><a href="">Cofiño</a></li>
            </ul>
        </div>

        <div class="links">
            <h4>Atención al cliente</h4>
            <ul>
                <li><a href="">Contacto</a></li>
                <li><a href="">Preguntas frecuentes</a></li>
                <li><a href="">Denuncias</a></li>
            </ul>
        </div>

        <div class="links">
            <h4>Redes Sociales</h4>
                    <div class="socials">
                    <a href="#">
                        <div class="social">
                            <img src="images/s1.svg" alt="">
                        </div>
                    </a>
                    <a href="#">
                        <div class="social">
                            <img src="images/s2.svg" alt="">
                        </div>
                    </a>
                    <a href="#">
                        <div class="social">
                            <img src="images/s3.svg" alt="">
                        </div>
                    </a>
                </div>
            </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script src="script.js"></script>
</body>

</html>