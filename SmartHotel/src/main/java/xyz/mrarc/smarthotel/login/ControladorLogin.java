package xyz.mrarc.smarthotel.login;

import spark.Request;
import spark.Response;
import spark.Route;
import xyz.mrarc.smarthotel.rutas.Ruta;
import xyz.mrarc.smarthotel.vistas.HandlerVistas;

import java.util.HashMap;
import java.util.Map;

public class ControladorLogin {
    public static Route servirLogin = (Request solicitud, Response respuesta) -> {
        Map<String, Object> model = new HashMap<>();
        return HandlerVistas.renderizarVista(solicitud, model, Ruta.Plantillas.PANEL_PRINCIPAL);
    };
    public static Route verificarAcceso = (Request solicitud, Response respuesta) -> {
        Map<String, Object> model = new HashMap<>();
        return HandlerVistas.renderizarVista(solicitud, model, Ruta.Plantillas.PANEL_PRINCIPAL);
    };
}
