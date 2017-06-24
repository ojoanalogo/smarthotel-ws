package xyz.mrarc.smarthotel.vistas;

import spark.ModelAndView;
import spark.Request;
import spark.template.velocity.VelocityTemplateEngine;

import java.util.Map;

public class HandlerVistas {

    public static String renderizarVista(Request solicitud, Map<String, Object> modelo, String rutaTemplate) {
        return new VelocityTemplateEngine().render(new ModelAndView(modelo, rutaTemplate));
    }
}
