package xyz.mrarc.smarthotel.utilidades;

import com.google.gson.Gson;
import spark.ResponseTransformer;

public class JSON {

    /**
     * Convierte un objeto a formato JSON
     *
     * @param objeto - Objeto a transformar
     * @return Objeto transformado a JSON
     */
    public static String convertirAJSON(Object objeto) {
        return new Gson().toJson(objeto);
    }

    public static ResponseTransformer json() {
        return JSON::convertirAJSON;
    }

}
