<?php
    require "includes/app.php";
    includeTemplate("header");
?>

    <main class="container section">
        <h1>Learn About Us</h1>

        <div class="aboutus-content">
            
            <picture>
                <source src="build/img/nosotros.avif" type="image/avif">
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="About Us Image">
            </picture>

            <div>
                <blockquote>25 Years of Experience</blockquote>
                <p>Proin consequat viverra sapien, malesuada tempor tortor feugiat vitae. In dictum felis et nunc aliquet molestie. Proin tristique commodo felis, sed auctor elit auctor pulvinar. Nunc porta, nibh quis convallis sollicitudin, arcu nisl semper mi, vitae sagittis lorem dolor non risus. Vivamus accumsan maximus est, eu mollis mi. Proin id nisl vel odio semper hendrerit. Nunc porta in justo finibus tempor. Suspendisse lobortis dolor quis elit suscipit molestie. Sed condimentum, erat at tempor finibus, urna nisi fermentum est, a dignissim nisi libero vel est. Donec et imperdiet augue. Curabitur malesuada sodales congue. Suspendisse potenti. Ut sit amet convallis nisi.</p>
                <p>Aliquam lectus magna, luctus vel gravida nec, iaculis ut augue. Praesent ac enim lorem. Quisque ac dignissim sem, non condimentum orci. Morbi a iaculis neque, ac euismod felis. Fusce augue quam, fermentum sed turpis nec, hendrerit dapibus ante. Cras mattis laoreet nibh, quis tincidunt odio fermentum vel. Nulla facilisi.</p>
            </div>
        </div>
    </main>

    <section class="container section">
        <h1>More About Us</h1>

        <div class="aboutus-icons">
            <div class="icon">
                <img src="build/img/icono1.svg" alt="Segurity Icon" loading="lazy">
                <h3>Segurity</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi fuga natus. Ratione laudantium consectetur suscipit provident illo tempore porro assumenda temporibus illum nisi deleniti, velit corrupti, facere sed quasi!</p>
            </div>

            <div class="icon">
                <img src="build/img/icono2.svg" alt="Price Icon" loading="lazy">
                <h3>Price</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi fuga natus. Ratione laudantium consectetur suscipit provident illo tempore porro assumenda temporibus illum nisi deleniti, velit corrupti, facere sed quasi!</p>
            </div>

            <div class="icon">
                <img src="build/img/icono3.svg" alt="Time Icon" loading="lazy">
                <h3>Time</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi fuga natus. Ratione laudantium consectetur suscipit provident illo tempore porro assumenda temporibus illum nisi deleniti, velit corrupti, facere sed quasi!</p>
            </div>
        </div>
    </section>

    <?php includeTemplate("footer"); ?>