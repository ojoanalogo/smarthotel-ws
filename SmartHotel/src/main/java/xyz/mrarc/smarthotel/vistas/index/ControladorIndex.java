package xyz.mrarc.smarthotel.vistas.index;

import spark.Request;
import spark.Response;
import spark.Route;
import xyz.mrarc.smarthotel.rutas.Ruta;
import xyz.mrarc.smarthotel.vistas.HandlerVistas;

import java.util.HashMap;
import java.util.Map;

public class ControladorIndex {
    public static Route servirIndex = (Request solicitud, Response respuesta) -> {
        Map<String, Object> model = new HashMap<>();
        model.put("nombre", "Alfonso");
        return HandlerVistas.renderizarVista(solicitud, model, Ruta.Plantillas.PUBLICA_INDEX);
    };
}