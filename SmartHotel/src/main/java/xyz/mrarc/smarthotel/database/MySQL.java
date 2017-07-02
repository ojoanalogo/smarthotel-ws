package xyz.mrarc.smarthotel.database;

import org.skife.jdbi.v2.DBI;
import spark.Spark;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;

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

    private static boolean isDbConnected(Connection db) {
        final String CHECK_SQL_QUERY = "SELECT 1";
        boolean isConnected = false;
        try {
            final PreparedStatement statement = db.prepareStatement(CHECK_SQL_QUERY);
            isConnected = true;
        } catch (SQLException | NullPointerException e) {
            // handle SQL error here!
        }
        return isConnected;
    }

    public void inicializarDatabase() throws SQLException {
        Connection db = DriverManager.getConnection("jdbc:mysql://" + this.host + "/" + this.database, this.usuario, this.clave);
        if (isDbConnected(db)) {
            this.dbi = new DBI("jdbc:mysql://" + this.host + "/" + this.database, this.usuario, this.clave);
        } else {
            System.out.println("DB NO ABIERTA");
            Spark.stop();
        }
    }

    public DBI obtenerDBI() {
        return this.dbi;
    }
}
