package xyz.mrarc.smarthotel.utilidades;

public class CodigoEstatus {

    private int codigoEstatus;
    private String msgEstatus;

    public CodigoEstatus(Estatus estatus) {
        this.codigoEstatus = estatus.obtenerCodigo();
        this.msgEstatus = estatus.obtenerMensaje();
    }

    public enum Estatus {
        REGISTRO_REGISTRADO(1, "Usuario registrado"),
        REGISTRO_YA_EXISTE(2, "Usuario ya existe"),
        REGISTRO_CAMPO_VACIO(3, "Error valor de datos"),
        AUTH_APP_CLAVE_CORRECTA(1, "Clave correcta"),
        AUTH_APP_CLAVE_INCORRECTA(2, "Clave incorrecta o usuario no encontrado");


        int codigoEstatus;
        String mensaje;

        Estatus(int codigoEstatus, String mensaje) {
            this.codigoEstatus = codigoEstatus;
            this.mensaje = mensaje;
        }
        public int obtenerCodigo() {
            return this.codigoEstatus;
        }

        public String obtenerMensaje() {
            return this.mensaje;
        }

    }

}
