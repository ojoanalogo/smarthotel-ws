package xyz.mrarc.smarthotel.vistas;

import spark.ModelAndView;
import spark.Request;
import spark.template.velocity.VelocityTemplateEngine;
import xyz.mrarc.smarthotel.rutas.Ruta;

import java.util.Map;

public class HandlerVistas {

    public static String renderizarVista(Request solicitud, Map<String, Object> modelo, String rutaTemplate) {
        return new VelocityTemplateEngine().render(new ModelAndView(modelo, Ruta.Otras.UBICACION_ARCHIVOS + rutaTemplate));
    }
}
