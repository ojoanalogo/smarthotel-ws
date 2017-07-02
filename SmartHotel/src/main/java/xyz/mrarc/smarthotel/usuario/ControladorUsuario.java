package xyz.mrarc.smarthotel.usuario;

import spark.Request;
import spark.Response;
import spark.Route;
import xyz.mrarc.smarthotel.SmartHotel;
import xyz.mrarc.smarthotel.utilidades.AuthHandler;
import xyz.mrarc.smarthotel.utilidades.CodigoEstatus;

import java.util.HashMap;

import static xyz.mrarc.smarthotel.utilidades.CodigoEstatus.Estatus.*;
import static xyz.mrarc.smarthotel.utilidades.JSON.convertirAJSON;

public class ControladorUsuario {

    public static Route crearUsuario = (Request solicitud, Response respuesta) -> {
        UsuarioDAO usuarioDAO = SmartHotel.database.obtenerDBI().onDemand(UsuarioDAO.class);
        String cuarto = solicitud.queryParams("cuarto");
        String nombre = solicitud.queryParams("nombre");
        String apellido = solicitud.queryParams("apellido");
        String correo = solicitud.queryParams("correo");
        String clave = solicitud.queryParams("clave");
        String id_pais = solicitud.queryParams("id_pais");
        respuesta.type("text/json");
        respuesta.status(200);
        for (String s : solicitud.queryParams()
                ) {
            if (solicitud.queryParams(s) == null || solicitud.queryParams(s).length() == 0 || solicitud.queryParams(s).equalsIgnoreCase("") || solicitud.queryParams(s).isEmpty()) {
                System.out.format("\nERROR: El valor de %s es nulo", s);
                return convertirAJSON(new CodigoEstatus(REGISTRO_CAMPO_VACIO));
            }
        }
        if (!yaExiste(correo)) {
            usuarioDAO.crearUsuario(cuarto, nombre, apellido, correo, clave, Integer.parseInt(id_pais));
            return convertirAJSON(new CodigoEstatus(REGISTRO_REGISTRADO));
        } else return convertirAJSON(new CodigoEstatus(REGISTRO_YA_EXISTE));
    };
    public static Route solicitarToken = (Request solicitud, Response respuesta) -> {
        respuesta.type("text/json");
        respuesta.status(200);
        UsuarioDAO usuarioDAO = SmartHotel.database.obtenerDBI().onDemand(UsuarioDAO.class);
        final HashMap<String, String> jsonObject = new HashMap<>();
        if (usuarioDAO.verificarClave(solicitud.queryParams("cuarto"), solicitud.queryParams("clave")) >= 1) {
            AuthHandler authHandler = new AuthHandler("MACHACA");
            jsonObject.put("token", authHandler.obtenerToken());
            jsonObject.put("codigoEstatus", String.valueOf(authHandler.obtenerCodigoEstatus()));
            return convertirAJSON(jsonObject);
        } else {
            return convertirAJSON(new CodigoEstatus(AUTH_APP_CLAVE_INCORRECTA));
        }
    };
    public static Route checarClave = (Request solicitud, Response respuesta) -> {
        UsuarioDAO usuarioDAO = SmartHotel.database.obtenerDBI().onDemand(UsuarioDAO.class);
        int size = usuarioDAO.verificarClave(solicitud.queryParams("cuarto"), solicitud.queryParams("clave"));
        respuesta.type("text/json");
        respuesta.status(200);
        if (size >= 1) {
            return convertirAJSON(new CodigoEstatus(AUTH_APP_CLAVE_CORRECTA));
        }
        return convertirAJSON(new CodigoEstatus(AUTH_APP_CLAVE_INCORRECTA));
    };
    private static boolean yaExiste(String correo) {
        UsuarioDAO usuarioDAO = SmartHotel.database.obtenerDBI().onDemand(UsuarioDAO.class);
        int size = usuarioDAO.yaExiste(correo);
        return size >= 1;
    }
}

