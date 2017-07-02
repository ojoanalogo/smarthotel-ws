package xyz.mrarc.smarthotel.utilidades;

import com.auth0.jwt.JWT;
import com.auth0.jwt.algorithms.Algorithm;
import com.auth0.jwt.exceptions.JWTCreationException;

import java.io.UnsupportedEncodingException;

public class AuthHandler {

    private String llave;
    private int codigoEstatus;

    public AuthHandler(String llave) {
        this.llave = llave;
        this.codigoEstatus = 0;
    }

    /**
     * Genera un token a partir de un hash
     * @return Token en caso de que salga bien
     */
    public String obtenerToken() {
        try {
            Algorithm algorithm = Algorithm.HMAC256(this.llave);
            this.codigoEstatus = 200;
            return JWT.create()
                    .withIssuer("auth0")
                    .sign(algorithm);
        } catch (UnsupportedEncodingException exception) {
            this.codigoEstatus = 201;
            return "unsuported";
        } catch (JWTCreationException exception) {
            //Invalid Signing configuration / Couldn't convert Claims.
            this.codigoEstatus = 202;
            return "errorJWT";
        }
    }

    /**
     * Retorna el código de estatus
     *
     * @return Código de estatus
     */
    public int obtenerCodigoEstatus() {
        return this.codigoEstatus;
    }
}
