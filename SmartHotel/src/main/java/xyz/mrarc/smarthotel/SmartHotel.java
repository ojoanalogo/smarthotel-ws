package xyz.mrarc.smarthotel;

import spark.Spark;
import xyz.mrarc.smarthotel.login.ControladorLogin;
import xyz.mrarc.smarthotel.rutas.Filtros;
import xyz.mrarc.smarthotel.rutas.Ruta;
import xyz.mrarc.smarthotel.usuario.Usuario;
import xyz.mrarc.smarthotel.vistas.admin.ControladorAdminPanel;
import xyz.mrarc.smarthotel.vistas.index.ControladorIndex;

public class SmartHotel extends Spark {

    public static Usuario usuario;
    public static boolean accesoAPI = false;

    public static void main(String[] args) {
        // Configuración principal
        configurarServidor();
        if (!accesoAPI) {
            usuario = new Usuario();
        }
        // Rutas web
        get(Ruta.Publica.INDEX, ControladorIndex.servirIndex);
        get(Ruta.Login.LOGIN_URL, ControladorLogin.servirLogin);
        get(Ruta.Admin.PANEL, ControladorAdminPanel.servirPanel);
        // Rutas POST
        post(Ruta.Login.LOGIN_POST, ControladorLogin.verificarAcceso);
    }

    /**
     * Configurar servidor al momento de llamarlo
     */
    private static void configurarServidor() {
        staticFiles.location(Ruta.Otras.UBICACION_ARCHIVOS); // Static files
        port(80);
        before("*", Filtros.añadirSlashes);
        before("*", Filtros.checarAccesoAPI);
    }
}