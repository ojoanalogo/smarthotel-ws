package xyz.mrarc.smarthotel.rutas;

import spark.Filter;
import spark.Request;
import spark.Response;
import xyz.mrarc.smarthotel.SmartHotel;

public class Filtros {

    /**
     * Añade un slash a la URL si el Usuario intenta manipular la URL y no truene el sistema
     */
    public static Filter añadirSlashes = (Request solicitud, Response respuesta) -> {
        if (!solicitud.pathInfo().endsWith("/")) {
            respuesta.redirect(solicitud.pathInfo() + "/");
        }
    };

    /**
     * Comprueba si la solicitud es para ver la API
     */
    public static Filter checarAccesoAPI = (Request solicitud, Response respuesta) -> {
        if (solicitud.pathInfo().startsWith(Ruta.API.API_INDEX)) {
            SmartHotel.accesoAPI = true;
        }
    };
}
