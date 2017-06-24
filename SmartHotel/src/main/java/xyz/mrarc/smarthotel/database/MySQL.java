package xyz.mrarc.smarthotel.database;

public class MySQL {

    private String host;
    private String puerto;
    private String database;
    private String usuario;
    private String clave;
    private boolean debug;

    /**
     * Constructor para la clase MySQL
     *
     * @param host     - El host URL de la base de datos
     * @param puerto   - Puerto de la base de datos
     * @param database - Nombre de la base de datos
     * @param usuario  - Usuario de la base de datos
     * @param clave    - Clave de la base de datos
     * @param debug    - Modo debug
     */
    public MySQL(String host, String puerto, String database, String usuario, String clave, boolean debug) {
        this.host = host;
        this.puerto = puerto;
        this.database = database;
        this.usuario = usuario;
        this.clave = clave;
        this.debug = debug;
    }

}
