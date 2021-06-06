<body>
 <h1>Gracias por tu subscripcion!</h1>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">//sweet alert para que se vea mas bonito</script>
    
    <script type="text/javascript"> //muestra un alert si todo va bien
        let mensaje = "<?php echo $mensaje ?>";
        if(mensaje == '1' )
        {
            swal('😎','Se agrego tu email con exito!, se te notificara la proxima vez que se añada un libro','success');    //alert("Agregado con exito");
        }
        else if (mensaje == '0') 
        {
            swal('😑 ','Error en la insercion hay algo mal con la PK','error'); //alert("No se agrego, error en la insercion");    
        }

    </script>
</body>