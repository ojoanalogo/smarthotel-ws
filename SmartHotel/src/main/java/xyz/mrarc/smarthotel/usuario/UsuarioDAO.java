package xyz.mrarc.smarthotel.usuario;

import org.skife.jdbi.v2.sqlobject.Bind;
import org.skife.jdbi.v2.sqlobject.SqlQuery;
import org.skife.jdbi.v2.sqlobject.SqlUpdate;

public interface UsuarioDAO {

    /**
     * Crea un usuario en la base de datos (modelo)
     *
     * @param cuarto   - El cuarto del huesped
     * @param nombre   - Nombre del huesped
     * @param apellido - Apellido
     * @param correo   - Correo electrónico
     * @param clave    - Clave de acceso
     * @param id_pais  - País
     */
    @SqlUpdate("INSERT INTO app_usuarios (cuarto, nombre, apellido, " +
            "correo, clave, id_pais) VALUES (:cuarto, :nombre, :apellido, " +
            ":correo, :clave, :id_pais)")
    void crearUsuario(@Bind("cuarto") String cuarto, @Bind("nombre") String nombre,
                      @Bind("apellido") String apellido, @Bind("correo") String correo,
                      @Bind("clave") String clave, @Bind("id_pais") int id_pais);

    /**
     * Obtener el cuarto donde se hospeda el usuario
     *
     * @param id_usuario - ID del usuario
     * @return cuarto del huesped
     */
    @SqlQuery("SELECT cuarto FROM app_usuarios WHERE id_usuario = :id_usuario")
    String obtenerCuarto(@Bind("id_usuario") int id_usuario);

    void cerrar();
}
