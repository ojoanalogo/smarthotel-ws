package xyz.mrarc.smarthotel.usuario;

import spark.Request;
import spark.Response;
import spark.Route;
import xyz.mrarc.smarthotel.SmartHotel;

public class ControladorUsuario {

    public static Route crearUsuario = (Request solicitud, Response respuesta) -> {
        UsuarioDAO usuarioDAO = SmartHotel.database.obtenerDBI().onDemand(UsuarioDAO.class);
        String cuarto = solicitud.queryParams("cuarto");
        String nombre = solicitud.queryParams("nombre");
        String apellido = solicitud.queryParams("apellido");
        String correo = solicitud.queryParams("correo");
        String clave = solicitud.queryParams("clave");
        String id_pais = solicitud.queryParams("id_pais");
        if (!yaExiste(correo)) {
            usuarioDAO.crearUsuario(cuarto, nombre, apellido, correo, clave, Integer.parseInt(id_pais));
            return 1;
        }
        return 0;
    };

    public static Route checarClave = (Request solicitud, Response respuesta) -> {
        UsuarioDAO usuarioDAO = SmartHotel.database.obtenerDBI().onDemand(UsuarioDAO.class);
        int size = usuarioDAO.verificarClave(solicitud.queryParams("cuarto"), solicitud.queryParams("clave"));
        if (size >= 1) {
            return 1;
        }
        return 0;
    };

    private static boolean yaExiste(String correo) {
        UsuarioDAO usuarioDAO = SmartHotel.database.obtenerDBI().onDemand(UsuarioDAO.class);
        int size = usuarioDAO.yaExiste(correo);
        return size >= 0;
    }
}
