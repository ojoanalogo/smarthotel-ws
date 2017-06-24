package xyz.mrarc.smarthotel.utilidades;

public class HandlerError {

    private String mensaje;

    /**
     * Constructor para el handler de errores
     * El metodo String.Format tiene el uso siguiente:
     * String.format("%s %s", "reemplazo 1", "reemplazo 2");
     *
     * @param mensaje    - Mensaje del handler de error
     * @param argumentos - Argumentos a pasar para el reemplazo de variables
     */
    public HandlerError(String mensaje, String... argumentos) {
        this.mensaje = String.format(mensaje, (Object[]) argumentos);
    }

    /**
     * Retorna el mensaje de error basado en lo que se coloco en el constructor
     *
     * @return Mensaje de error
     */
    public String obtenerMensajeDeError() {
        return this.mensaje;
    }

}
