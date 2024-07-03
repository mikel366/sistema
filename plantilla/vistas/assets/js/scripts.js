/*=============================================
Función Sweetalert
=============================================*/
function fncSweetAlert(type, text, url) {
    switch (type) {
        /*=============================================
   Cuando ocurre un error
   =============================================*/
        case "error":
            if (url == null) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: text,
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: text,
                }).then((result) => {
                    if (result.value) {
                        window.open(url, "_top");
                    }
                });
            }

            break;
        /*=============================================
   Cuando es correcto
   =============================================*/
        case "success":
            if (url == null) {
                Swal.fire({
                    icon: "success",
                    title: "OK",
                    text: text,
                });
            } else {
                Swal.fire({
                    icon: "success",
                    title: "OK",
                    text: text,
                }).then((result) => {
                    if (result.value) {
                        window.open(url, "_top");
                    }
                });
            }
            break;
        /*=============================================
   Cuando estamos precargando
   =============================================*/
        case "loading":
            Swal.fire({
                allowOutsideClick: false,
                icon: "info",
                text: text,
            });
            Swal.showLoading();
            break;
        /*=============================================
   Cuando necesitamos cerrar la alerta suave
   =============================================*/
        case "close":
            Swal.close();
            break;
        /*=============================================
   Cuando solicitamos confirmación
   =============================================*/
        case "confirm":
            return new Promise((resolve) => {
                Swal.fire({
                    text: text,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancel",
                    confirmButtonText: "Yes, delete!",
                }).then(function (result) {
                    resolve(result.value);
                });
            });
            break;
    }
}

/*=============================================
FUNCIÓN PARA ABRIR UN POPUP CENTRADO
=============================================*/

function VentanaCentrada(
    theURL,
    winName,
    features,
    myWidth,
    myHeight,
    isCenter
) {
    if (window.screen)
        if (isCenter)
            if (isCenter == "true") {
                var myLeft = (screen.width - myWidth) / 2;
                var myTop = (screen.height - myHeight) / 2;

                features += features != "" ? "," : "";
                features += ",left=" + myLeft + ",top=" + myTop;
            }

    window.open(
        theURL,
        winName,
        features +
            (features != "" ? "," : "") +
            "width=" +
            myWidth +
            ",height=" +
            myHeight
    );
}