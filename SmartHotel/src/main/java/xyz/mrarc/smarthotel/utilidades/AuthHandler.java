package xyz.mrarc.smarthotel.utilidades;

import com.auth0.jwt.JWT;
import com.auth0.jwt.algorithms.Algorithm;
import com.auth0.jwt.exceptions.JWTCreationException;

import java.io.UnsupportedEncodingException;

public class AuthHandler {

    /**
     * Genera un token a partir de un hash
     *
     * @param llave - Llave base a convertir
     * @return Token en caso de que salga bien
     */
    public String obtenerToken(String llave) {
        try {
            Algorithm algorithm = Algorithm.HMAC256(llave);
            return JWT.create()
                    .withIssuer("auth0")
                    .sign(algorithm);
        } catch (UnsupportedEncodingException exception) {
            return "unsuported";
        } catch (JWTCreationException exception) {
            //Invalid Signing configuration / Couldn't convert Claims.
            return "errorJWT";
        }
    }
}
