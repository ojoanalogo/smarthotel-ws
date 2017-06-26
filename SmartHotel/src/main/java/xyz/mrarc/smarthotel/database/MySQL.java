package xyz.mrarc.smarthotel.database;

import org.skife.jdbi.v2.DBI;

public class MySQL {

    private String host;
    private String puerto;
    private String database;
    private String usuario;
    private String clave;
    private boolean debug;
    private DBI dbi;

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

    public void inicializarDatabase() {
        this.dbi = new DBI("jdbc:mysql://" + this.host + "/" + this.database, this.usuario, this.clave);
        System.out.println(dbi.getSQLLog());
    }

    public DBI obtenerDBI() {
        return this.dbi;
    }
}
