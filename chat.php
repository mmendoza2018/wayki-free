<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot WaykiBot</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>

</style>

<body>

    <div class="container-chatbot">

        <div class="subcontainer-chatbot">

            <i class="fa-brands fa-rocketchat fa-xl" style="color: rgba(191,144,0,1)" onclick="mostrarChat()"></i>

            <!-- chatbot  -->
            <div class="wrapper" id="chatGlobal">
                <form id="formChatBot">
                <div class="title">
                    <h2>ChatBot WaykiBot</h2>
                    <i class="fa-solid fa-circle-xmark fa-lg" onclick="ocultarChat()"></i>
                </div>
                <div class="form">
                    <div class="bot-inbox inbox">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="msg-header">
                            <p>Hola, ¿cómo puedo ayudarte?, si deseas reservar dale click a nuestro boton,
                                si deseas consultar inicia el chat con nuestro WaykiBot
                            </p>
                            <br>
                            <!-- <a href="registrar_1.php" class="boton-redireccion">Reservar</a> -->
                        </div>

                    </div>
                </div>
                <div class="typing-field">
                    <div class="input-data">
                        <input id="data" type="text" placeholder="Escribe algo aquí.." required>
                        <button id="send-btn" type="submit">Enviar</button>
                    </div>
                </div>
                </form>
            </div>
            <!-- fin chatbot  -->

        </div>
    </div>

    <script src="funciones.js"></script>
    <script>
        $(document).ready(function() {
            $("#formChatBot").on("submit", function(e) {
                e.preventDefault();
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // iniciar el código ajax
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function(result) {
                        console.log('result :>> ', JSON.parse(result));
                        let { texto, fin_conversacion, destino_id, tipo_destino } = JSON.parse(result);
                        let btnReserva = ``;
                        console.log('destino_id :>> ', destino_id);
                        if (fin_conversacion == "1") {
                            btnReserva = `<a class="btn" style="background-color: #fd7d1c" href="registrar_vista.php?destino_id=${destino_id}&tipo_destino=${tipo_destino}" >Reservar</a>`;
                        }
                        $replay = `<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p> ${texto} </p>
                        ${btnReserva}</div></div>`;

                        $(".form").append($replay);
                        // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

</body>

</html>