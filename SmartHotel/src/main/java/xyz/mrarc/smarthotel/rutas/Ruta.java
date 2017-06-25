package xyz.mrarc.smarthotel.rutas;

public class Ruta {

    /**
     * Ubicación de Rutas
     */
    // Rutas publicas
    public static class Publica {
        public static final String INDEX = "/";
    }

    // Rutas para index
    public static class Login {
        public static final String LOGIN_URL = "/index/";
        public static final String LOGIN_POST = "/index/";
    }

    // Rutas panel Administración
    public static class Admin {
        public static final String PANEL = "/panel/";
    }

    // Rutas API
    public static class API {
        public static final String API_INDEX = "/api/";
    }

    // Rutas plantillas
    public static class Plantillas {
        public static final String PUBLICA_INDEX = "index.vm";
        public static final String PUBLICA_ACERCA = "acerca.vm";
        public static final String PUBLICA_LOGIN = "admin/index.vm";
        public static final String PANEL_PRINCIPAL = "admin/panel.vm";
        public static final String PANEL_PROBAR_API = "admin/probar.vm";
        public static final String ERROR_404 = "404.vm";
    }

    // Otras Rutas
    public static class Otras {
        public static final String UBICACION_ARCHIVOS = "public/";
    }
}