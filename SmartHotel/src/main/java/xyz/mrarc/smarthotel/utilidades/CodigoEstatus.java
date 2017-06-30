package xyz.mrarc.smarthotel.utilidades;

public class CodigoEstatus {

    private String msgEstatus;
    private int codigoEstatus;

    public CodigoEstatus(Estatus estatus) {
        this.msgEstatus = estatus.obtenerMensaje();
        this.codigoEstatus = estatus.obtenerCodigo();
    }

    public enum Estatus {
        USUARIO_REGISTRADO(1, "Usuario registrado"),
        USUARIO_YA_EXISTE(2, "Usuario ya existe");

        int codigoEstatus;
        String mensaje;

        Estatus(int codigoEstatus, String mensaje) {
            this.codigoEstatus = codigoEstatus;
            this.mensaje = mensaje;
        }

        public String obtenerMensaje() {
            return this.mensaje;
        }

        public int obtenerCodigo() {
            return this.codigoEstatus;
        }
    }

}
