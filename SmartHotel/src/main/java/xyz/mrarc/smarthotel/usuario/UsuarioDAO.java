package xyz.mrarc.smarthotel.usuario;

import org.skife.jdbi.v2.sqlobject.Bind;
import org.skife.jdbi.v2.sqlobject.GetGeneratedKeys;
import org.skife.jdbi.v2.sqlobject.SqlQuery;
import org.skife.jdbi.v2.sqlobject.SqlUpdate;

import java.util.List;
import java.util.Map;

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
     * Verifica si la clave es correcta
     * @param cuarto - Cuarto del huesped
     * @param clave - Clave de usuario
     * @return Cantidad de filas con ese parametro (debería ser 1 si la clave es correcta)
     */
    @SqlQuery("SELECT id_usuario FROM app_usuarios WHERE cuarto = :cuarto AND clave = :clave")
    @GetGeneratedKeys
    List<Map<String, Object>> verificarClave(@Bind("cuarto") String cuarto, @Bind("clave") String clave);

    /**
     * Checa si ya existe el correo registrado
     * @param correo - Correo del usuario
     * @return Cantidad de filas con ese correo (max 1)
     */
    @SqlQuery("SELECT id_usuario FROM app_usuarios WHERE correo = :correo")
    @GetGeneratedKeys
    List<Map<String, Object>> yaExiste(@Bind("correo") String correo);

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
