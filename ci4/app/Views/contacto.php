<!-- Script para llamar al submit -->
<div class="container">

    <div class="col-12 col-sm8- offset -sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="container">

            <form id='myForm'>
                <h2>Ponte en contacto con nosotros</h2>
                <hr>
                <div class="form-group">
                    <label>Nombre</label>
                    <input id="name" class="form-control" type="text" placeholder="Introduzca su nombre">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input id="email" class="form-control" type="email" placeholder="Introduzca su correo electronico">
                </div>
                <div class="form-group">
                    <label>Tema</label>
                    <input id="subject" class="form-control" type="text" placeholder="Escriba el tema">
                </div>
                <div class="form-group">
                    <label>Mensaje</label>
                    <textarea id="body" class="form-control" rows="5" placeholder="Cuentanos el problema"></textarea>
                </div>

                <button class="btn btn-primary" type="button" onclick='sendEmail()'>Enviar</button>

            </form>
        </div>
    </div>
</div>
<h4 class="sent-notification"></h4>
<script src="/assets/mailer/mailCheck.js"></script>