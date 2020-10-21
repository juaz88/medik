<?php include_once('header.php'); ?>


    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="index.php">Home</a></li>

                </ol>
                <h2>Titulo de la pagina</h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section class="inner-page pt-4">
            <div class="container">
                <p>
                    Ejemplo de plantilla
                    <div class="col-lg-6">

                        <div class="form">

                            <h4>Formularios</h4>
                            <p>Este es un ejemplo de formulario para la aplicacion</p>

                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validate"></div>
                                </div>

                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">gracias por enviar la informacion!</div>
                                </div>

                                <div class="mb-3">
                                    <input type="password" name="clave">
                                </div>

                                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                            </form>

                        </div>

                    </div>
                </p>
            </div>

            <br>
            <br>
        </section>

    </main>
    <!-- End #main -->
    <?php include_once('footer.php'); ?>    

