package xyz.mrarc.smarthotel.usuario;

import spark.Request;
import spark.Response;
import spark.Route;
import xyz.mrarc.smarthotel.SmartHotel;

public class ControladorUsuario {

    public static Route crearUsuario = (Request solicitud, Response respuesta) -> {
        UsuarioDAO usuarioDAO = SmartHotel.database.obtenerDBI().onDemand(UsuarioDAO.class);
        System.out.println("h3");
        String cuarto = solicitud.queryParams("cuarto");
        String nombre = solicitud.queryParams("nombre");
        String apellido = solicitud.queryParams("apellido");
        String correo = solicitud.queryParams("correo");
        String clave = solicitud.queryParams("clave");
        String id_pais = solicitud.queryParams("id_pais");
        System.out.println("h4");
        usuarioDAO.crearUsuario(cuarto, nombre, apellido, correo, clave, Integer.parseInt(id_pais));
        System.out.println("h5");
        return "HOLA";
    };
}
